# Hospital Management System 🏥

A web-based Hospital Management System designed to streamline administrative and patient-related processes in a medical facility. This system enables efficient appointment handling, patient record management, authentication, and more.

## 🌟 Features

- 🔐 **Authentication System** (login, registration)
- 🧑‍⚕️ **Admin Dashboard** – manage doctors, appointments, and departments
- 📅 **Appointment Scheduling** – book and track appointments
- 🗃️ **Patient Record Management** – view, add, and update patient info
- 📋 **Consultation Tracking**
- 🖼️ Image Uploads and CSS Styling
- 📦 Modular Structure for maintainability

## 🧾 Project Structure
├── admin/ # Admin dashboard files
├── appointment/ # Appointment logic and views
├── auth/ # Authentication (login, registration)
├── consultation/ # Consultation tracking
├── css/ # Stylesheets
├── images/ # Image assets
├── patient/ # Patient-related files
├── patientpassport/ # Patient ID/passport management


## 🚀 Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- MySQL or other supported database
- Web server (Apache, Nginx, or Laravel's built-in server)

### Installation

```bash
git clone https://github.com/enocklan/hospital-ms.git
cd hospital-ms
composer install
cp .env.example .env
php artisan key:generate

Configure your .env database credentials.

Run migrations (if using Laravel):

php artisan migrate

Serve the app:
php artisan serve
