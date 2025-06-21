# 🏥 Hospital Management System

A full-featured Laravel-based Hospital Management System designed to streamline administrative, medical, and patient operations in a modern healthcare environment.

---
![Image](https://github.com/user-attachments/assets/deb8de42-0d02-4690-b518-614538c9054e)
## 🚀 Features

### 👨‍💼 Admin Dashboard
- Add, update, or remove **Doctors**, **Nurses**, and **Receptionists**
- Manage **Patients**, their records, and system access
- View statistics and activity logs
- Control access roles and permissions

### 👨‍⚕️ Doctors
- View and manage assigned **patients' medical records**
- Add **diagnosis**, **treatments**, and **prescriptions**
- Schedule appointments

### 👩‍⚕️ Nurses
- Access patient details assigned to their care
- Update **vital signs**, **medication status**, and **daily reports**

### 🧾 Receptionist
- Register new **patients** and create their user accounts
- Schedule or cancel **appointments**
- Generate and download **bills and invoices**
- View patient check-in/check-out status

### 👤 Patients
- Self-register or register via receptionist
- View their **personal medical history**
- Download **medical bills** and visit summaries
- Receive doctor prescriptions and recommendations

---

## 📦 Built With

- **Laravel** – PHP Web Framework
- **Blade** – Laravel Templating Engine
- **MySQL** – Database
- **Bootstrap** – Frontend Styling
- **html2pdf.js** – Generate downloadable PDFs
- **Parsley.js** – Frontend Form Validation (optional)
- **AJAX** – For dynamic data interactions (optional)

---

## 📷 Screenshots

> _Add screenshots of your dashboard, bill generator, or patient portal here_

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/your-username/hospital-management-system.git

# Go into the project folder
cd hospital-management-system

# Install dependencies
composer install
npm install && npm run dev

# Copy and edit environment file
cp .env.example .env
php artisan key:generate

# Setup your database
php artisan migrate --seed

# Start the server
php artisan serve
🔐 Roles & Permissions

Role	Access Description
Admin	Full access to all modules
Doctor	Access patient records, update diagnosis
Nurse	View patient info, update daily data
Receptionist	Create users, manage appointments, download bills
Patient	View personal records, 
