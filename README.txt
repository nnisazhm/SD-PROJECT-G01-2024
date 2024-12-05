---

 MEQA.MY E-Commerce System

Version: 1.0  
Developer: Khairunnisa binti Azham, Ariana Arissa binti Azri, Nuha Afifah binti Zahal, Nurain binti Azmi, Nur Afifah Nabihah binti Norisham
Hosting: Hostinger Premium Plan  
Local Server Used for Development: UniServer Zero XV  

---

 Project Overview
MEQA.MY is a comprehensive e-commerce system designed for a clothing brand. The system features a user-friendly online shopping platform for customers and a dashboard for staff and admin to manage products and orders. The project adheres to a modular architecture and includes a secure payment integration with ToyyibPay.

---

 System Requirements
1. Server Environment:
   - PHP 7.4 or later.
   - MySQL 5.7 or later.  

2. Dependencies:
   - UniServer Zero XV for local development.
   - msmtp for email sending (password reset and signup verification).  

3. Browser:
   - Compatible with Chrome, Firefox, Edge.

---

 Installation Instructions

 Local Development
1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/nnisazhm/SD-PROJECT-G01-2024.git
   ```
2. Import the database:
   - Import the provided SQL file (`meqa_my-db.sql`) to your MySQL server.  

3. Configure environment variables:
   - Update database credentials in `db_connection.php`.  
   - Update email settings in `msmtp` configuration.  

4. Run the application locally:
   - Start UniServer and navigate to the folder in your browser:  
     ```
     http://localhost:90/MEQA.MY%20ECOMMERCE%20SYSTEM/system/meqa-ecommerce/dist/index.html
     ```
  
---

 Folder Structure

MEQA.MY ECOMMERCE SYSTEM
│
├── installer/
│   └── UniServer Zero XV
│
├── database/
│   └── meqa_my-db.sql
│
├── system/
│   ├── meqa-dashboard/
│   │   ├── production/
│   │   │   ├── css/
│   │   │   ├── images/
│   │   │   ├── js/
│   │   │   └── uploads/
│   │   └── vendors/
│   └── meqa-ecommerce/
│       └── dist/
│           └── assets/
│               ├── css/
│               ├── fonts/
│               ├── images/
│               ├── js/
│               └── svgs/
│
└── README.txt


---

 Acknowledgments
- Hostinger: Hosting platform.  
- UniServer Zero XV: Local server environment.  
- ToyyibPay: Payment gateway provider.  
- msmtp: Email sending utility.  

---

Test Credentials
- Admin & Staff User
    Email: nizzaazham04@gmail.com
    Password: nizza4
- Customer User
    Email: nnisazhm@gmail.com
    Password: nnisazhm