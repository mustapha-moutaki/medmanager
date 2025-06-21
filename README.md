# 🏥 Hospital Management System

A full-featured Laravel-based Hospital Management System designed to streamline administrative, medical, and patient operations in a modern healthcare environment.

[![Image](https://github.com/user-attachments/assets/deb8de42-0d02-4690-b518-614538c9054e)](https://github.com/user-attachments/assets/df9a851f-878e-4014-b88f-a4690ea7a99f)

---
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

![Image](https://github.com/user-attachments/assets/86a78ac3-e861-4ded-8d0e-30f039b3845a)

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

- ![Image](https://github.com/user-attachments/assets/345791fa-5bfd-4a63-a072-395073db9d4c)

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

## 🧠 System Design

> ✅ Use Case Diagram(patient, medicalAssistant, doctor)
<img width="7456" alt="Image" src="https://github.com/user-attachments/assets/aff420b2-fc9c-4001-ba27-528a33f649ca" />

> ✅ Class Diagram
![Image](https://github.com/user-attachments/assets/d4e7b782-3e9d-4beb-aade-2a31ee4c344b)

---
### please don't fogot to check uml folder for more details


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
