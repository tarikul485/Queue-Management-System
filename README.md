# 🏢 Aisa Pro - Queue Management System

A professional **Queue Management System** built with HTML, CSS, JavaScript, and PHP.  
Designed to manage clients efficiently, generate queue tokens, and display real-time statistics.

---

## 🚀 Features
- Add clients with name, service, and guichet
- Auto-generate and print tokens (100mm × 100mm)
- Live queue updates every 5 seconds
- Global and per-guichet statistics
- Password-protected pages
- “Reset All Tokens” functionality
- Printable tokens with company info (name, address, phone)

---

## ⚙️ Installation (XAMPP)

### 1️⃣ Move Project Folder
Place your project folder in XAMPP’s `htdocs` folder:  
C:\xampp\htdocs\aisapro

### 2️⃣ Start XAMPP
1. Open **XAMPP Control Panel**  
2. Click **Start** on **Apache** (and **MySQL** if needed)

### 3️⃣ Access Project Locally
Open a browser and go to:  
http://localhost/aisapro/

yaml
Copy code

---

## 🌐 Network Access with Custom Domain (`www.aisapro.com`)

### Step 1: Enable Virtual Hosts
1. Open `C:\xampp\apache\conf\httpd.conf`  
2. Find:
#Include conf/extra/httpd-vhosts.conf

r
Copy code
Remove the `#` to uncomment it.  
3. Save the file.

### Step 2: Configure Virtual Host
Edit `C:\xampp\apache\conf\extra\httpd-vhosts.conf` and add:

```apache
<VirtualHost *:80>
 DocumentRoot "C:/xampp/htdocs/aisapro"
 ServerName www.aisapro.com
 <Directory "C:/xampp/htdocs/aisapro">
     Options Indexes FollowSymLinks
     AllowOverride All
     Require all granted
 </Directory>
</VirtualHost>
Save the file.

Step 3: Update Hosts File on All PCs
Edit the hosts file:

makefile
Copy code
C:\Windows\System32\drivers\etc\hosts
Add the line (replace IP with your PC running XAMPP):

Copy code
192.168.0.101   www.aisapro.com
Step 4: Restart Apache
Open XAMPP → Stop Apache → Start Apache again

Step 5: Test
On any PC in the same network, open:

arduino
Copy code
http://www.aisapro.com
It should load your project.

🖨️ Printer Setup & Firefox Auto-Print
1️⃣ Install Printer Software
Install your receipt printer software or drivers on each PC that will print tokens.

2️⃣ Configure Firefox for Silent Printing
Open Firefox and type in the address bar:

arduino
Copy code
about:config
Search for print.always_print_silent

If it does not exist, create a new Boolean → set it to true

Check print.show_print_progress → set to false

This ensures tokens print automatically without a print dialog.

###Technologies Used
HTML5, CSS3
JavaScript 
PHP for backend
JSON for configuration

👤 Author
tarikul islam
📧 Contact: contact@tarikul.fr

🪪 License
This project is open-source under the MIT License.
