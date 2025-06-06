# Office Management System (Laravel + MySQL)

A simple CRUD-based Office Management System built using Laravel and MySQL, with DataTables integration and dynamic Country-State-City dropdowns using external API.

---

## 🚀 Features

- Employee and Company CRUD operations
- Assign managers to employees (self-reference)
- DataTables for search, pagination & sorting
- Filters: by Company, Position, Manager
- Dynamic dropdowns for Country, State, City using countriesnow.space API
- Responsive and clean UI using Bootstrap (dark theme)

---

## 🛠️ Technologies Used

- **Backend:** Laravel 10
- **Database:** MySQL
- **Frontend:** Bootstrap 5, jQuery, DataTables
- **External API:** [countriesnow.space](https://countriesnow.space)
- **Version Control:** Git, GitHub

---

## 📷 Screenshots

(Add your screenshots here – optional but recommended)

---

## 📁 Installation Guide

1. **Clone the repository:**

```bash
git clone https://github.com/11alkatiwari/Office_management-laravel.git
cd Office_management-laravel
```

2. **Install dependencies:**

```bash
composer install
npm install && npm run dev
```

3. **Set up the environment:**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure `.env`:**  
   - Set your database credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD)
   - Example:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=office_management
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations:**

```bash
php artisan migrate
```

6. **Run the application:**

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 🔗 External API Setup

Country, State, City data is fetched from [countriesnow.space API](https://countriesnow.space). No authentication required.

---

## 🙋 Author

**Alka Tiwari**  
[GitHub Profile](https://github.com/11alkatiwari)
