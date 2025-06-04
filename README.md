# ⚡ AnalyticsZphisher

An **educational dashboard project** to demonstrate how phishing pages collect data and how it can be analyzed.  
This project integrates a custom data collection system into the [Zphisher](https://github.com/htr-tech/zphisher) tool by **htr-tech** for awareness, research, and detection purposes.

> 🚨 **DISCLAIMER**: This project is for **educational and ethical purposes only**. It must **not be used for malicious activities** or without consent. Always respect local laws and cybersecurity ethics.

---

## 📁 Project Structure

- auth/index.html 
- auth/get_data.php
- zphisher.sh

---

## 🛠️ Setup Instructions

1. **Clone Zphisher from GitHub**

         git clone https://github.com/htr-tech/zphisher.git
         cd zphisher
   
3. **Replace the phishing site files**

   - Inside sites/, create or replace the directory auth/ with your own:

         - index.html (custom phishing form)

         - get_data.php (to store form input in a file or database)

4. Replace zphisher.sh

   - Replace the original zphisher.sh with the updated version from this repo.

   - This version is modified to:

         Load the custom auth/ folder

         Properly direct captured form data to get_data.php

## 🎯 Project Goal

The goal of this project is to simplify the way phishing data is collected and viewed using Zphisher. Instead of just reading raw data from the terminal, this project lets users store login information from phishing pages in a structured way and makes it easier to visualize and analyze later—possibly through an analytics dashboard or interface. It helps improve understanding of how phishing attempts perform without digging through logs manually.


## 🙏 Credits

htr-tech/zphisher – Base tool used for simulation.

Custom modifications by ZuuuSSzz.
