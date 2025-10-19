const express = require('express');
const ThermalPrinter = require('node-thermal-printer').printer;
const PrinterTypes = require('node-thermal-printer').types;
const os = require('os');

const app = express();
const port = 3000;

// Helper function to get local IP
function getLocalIp() {
  const interfaces = os.networkInterfaces();
  for (const name of Object.keys(interfaces)) {
    for (const net of interfaces[name]) {
      if (net.family === 'IPv4' && !net.internal) {
        return net.address;
      }
    }
  }
  return 'localhost';
}

app.use(express.json());

app.post('/print', async (req, res) => {
  const { token } = req.body;

  if (!token) {
    return res.status(400).send('No token provided');
  }

  let printer = new ThermalPrinter({
    type: PrinterTypes.EPSON,   // Most POS printers use EPSON standard
    interface: 'printer:POS-80',        // <- Replace this with the correct printer interface if needed
    width: 48,
    characterSet: 'SLOVENIA',
    removeSpecialCharacters: false,
    lineCharacter: "-",
  });

  let isConnected = await printer.isPrinterConnected();
  if (!isConnected) {
    return res.status(500).send('Printer not connected');
  }

  printer.alignCenter();
  printer.setTextDoubleHeight();
  printer.setTextDoubleWidth();
  printer.println(token);
  printer.newLine();
  printer.cut();

  try {
    await printer.execute();
    res.send('Printed successfully');
  } catch (error) {
    console.error('Print error:', error);
    res.status(500).send('Print failed');
  }
});

// Listen on 0.0.0.0 to accept connections from any IP
app.listen(port, '0.0.0.0', () => {
  const localIp = getLocalIp();
  console.log(`✅ Printer server running at:`);
  console.log(`   - http://localhost:${port}`);
  console.log(`   - http://${localIp}:${port}`);
});
