# ⚡ AnalyticsZphisher

An **educational dashboard project** to demonstrate how phishing pages collect data and how it can be analyzed.  
This project integrates a custom data collection system into the [Zphisher](https://github.com/htr-tech/zphisher) tool by **htr-tech** for awareness, research, and detection purposes.

> 🚨 **DISCLAIMER**: This project is for **educational and ethical purposes only**. It must **not be used for malicious activities** or without consent. Always respect local laws and cybersecurity ethics.

---

## 📁 Project Structure

AnalyticsZphisher/
│
├── auth/
│ ├── index.html # Custom login page (phishing simulation)
│ └── get_data.php # Script to capture and log credentials
│
├── zphisher.sh # Updated Zphisher script pointing to the auth folder
└── README.md # This documentation


---

## 🛠️ Setup Instructions

1. **Clone Zphisher from GitHub**
   ```bash
   git clone https://github.com/htr-tech/zphisher.git
   cd zphisher
Replace the phishing site files

Inside sites/, create or replace the directory auth/ with your own:

index.html (custom phishing form)

get_data.php (to store form input in a file or database)

Replace zphisher.sh

Replace the original zphisher.sh with the updated version from this repo.

This version is modified to:

Load the custom auth/ folder

Properly direct captured form data to get_data.php

🎯 Project Goal
Simulate phishing in a controlled environment

Capture test data such as usernames and passwords

Use the captured data to build a dashboard for:

Credential pattern analysis

Timestamp logging

Source IP tracking (optional)

User behavior study (mock only)

📈 Future Plans
Integrate visual analytics dashboard (e.g. using PHP/JS/Chart.js)

Add honeypot logging features

Create real-time threat alerting system (for educational red team labs)

📌 Important Notice
This is not intended for real-world deployment.

It is meant for student research, awareness campaigns, and CTF learning environments.

✅ Always use responsibly.
❌ Never use against real users without permission.

🙏 Credits
htr-tech/zphisher – Base tool used for simulation.

Custom modifications by ZuuuSSzz.
