# Laravel Job Portal

A simple yet functional Job Application Portal built with Laravel. It allows users to create, edit, filter, and delete job applications efficiently with features like live filtering, pagination, and beautiful modal confirmations.

---

## 🚀 Features

- CRUD for job applications
- Real-time filtering via AJAX
- Pagination support
- SweetAlert2 for delete confirmation
- Clean and responsive UI (Bootstrap)
- Laravel Blade templating

---

## 📸 Screenshots

> You can upload screenshots in your repo under `/screenshots/` and reference them like this:

![Dashboard View](screenshots/dashboard.png)
![Edit Application](screenshots/edit.png)

---

## 🛠️ Tech Stack

- **Backend**: Laravel 10+
- **Frontend**: Blade, Bootstrap 5
- **Database**: MySQL (or SQLite for local dev)
- **JS Libraries**: jQuery, SweetAlert2

---

## 📦 Installation

1. **Clone the repo**

```bash
git clone https://github.com/your-username/laravel-job-portal.git
cd laravel-job-portal

2. Install dependencies

bash
Copy
Edit
composer install
npm install && npm run dev

3.Set up environment

bash
Copy
Edit
cp .env.example .env
php artisan key:generate

4.Set up database

Create a database (MySQL or SQLite)

Update .env with DB credentials

5.Run:

php artisan migrate