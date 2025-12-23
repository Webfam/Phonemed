📱 PhoneMed

PhoneMed is a modern e-commerce and service management platform for phones, accessories, and electronics, built with Laravel.
It is designed to support online sales, inventory management, customer orders, and future AI-powered assistance.

🚀 Project Overview

PhoneMed aims to provide a fast, scalable, and user-friendly system for:

Selling smartphones, accessories, and electronics

Managing products, stock, and categories

Handling customer orders and payments

Supporting both customers and administrators

Preparing for API & AI integration for customer support and recommendations

✨ Key Features
🛒 Frontend (Customer Side)

Product catalog (phones, accessories, electronics)

Product search & filtering

Product details with images & specifications

Shopping cart & checkout

User registration & login

Order tracking

Mobile-friendly responsive design

🧑‍💼 Admin Panel

Dashboard overview (sales, orders, customers)

Product management (CRUD)

Category & brand management

Inventory / stock control

Order management (pending, paid, delivered)

User & role management

🔐 System Features

Secure authentication

Role-based access control

Database migrations & seeders

REST-ready architecture for API integration

Scalable Laravel MVC structure

🛠 Tech Stack

Backend: Laravel (PHP)

Frontend: Blade Templates, Bootstrap / Tailwind

Database: MySQL

Version Control: Git & GitHub

Server: Apache (XAMPP / Production Ready)

Future: API integration, AI customer assistant

📂 Project Structure (High Level)
Phonemed/
├── app/
├── database/
├── resources/
│   └── views/
├── routes/
│   ├── web.php
│   └── api.php
├── public/
└── README.md

⚙️ Installation & Setup
git clone https://github.com/Webfam/Phonemed.git
cd Phonemed
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


Access the app at:

http://127.0.0.1:8000

🧪 Development Status

🚧 Active Development
Planned improvements include:

Payment gateway integration

Order invoices & receipts

AI-powered customer assistant

Vendor & supplier management

Mobile app API support

🤝 Contributing

Contributions are welcome.
Please fork the repository, create a feature branch, and submit a pull request.

📄 License

This project is open-source and licensed under the MIT License.

👤 Author

Webfam Kenya
📍 Nanyuki, Kenya
🌐 https://github.com/Webfam
