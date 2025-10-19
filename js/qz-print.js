// Connect to QZ Tray automatically
function connectQZ() {
    if (!qz.websocket.isActive()) {
      qz.websocket.connect().catch(function(err) {
        console.error('QZ Tray Error:', err);
        alert('Please allow QZ Tray connection!');
      });
    }
  }
  
  // Print simple 80x80mm ticket
  function printTicket(token, name, service, room) {
    connectQZ();
  
    const config = qz.configs.create(null, {
      size: { width: 80, height: 80, units: "mm" }
    });
  
    const data = [
      {
        type: 'raw',
        format: 'plain',
        data: `
  ===============================
          Welcome
  ===============================
  Token : ${token}
  Name  : ${name}
  Service: ${service}
  Room  : ${room}
  -------------------------------
  Thank you for waiting patiently
      `.trim()
      }
    ];
  
    qz.print(config, data).catch(function(e) { console.error(e); });
  }
  