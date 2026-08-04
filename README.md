<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo">
</p>

<h1 align="center">NotesHub — Laravel Full Stack Notes App</h1>

<p align="center">
  A full stack notes management application built with Laravel, featuring authentication,
  OTP-based password recovery, role-based access control, categories, favorites and search.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/BootStrap-5-06B6D4?logo=bootstrap&logoColor=white" alt="BootStrap">
  <img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License">
</p>

---

## 📖 About the Project

**NotesHub** is a full stack notes-taking web application built on the Laravel framework. It allows
registered users to create, organize, and manage personal notes under different categories, mark
notes as favorites, and search through them. The application also includes a secure OTP-based
password reset flow and an admin panel for managing users and categories.

---

## ✨ Features

- 🔐 **Authentication** — user registration and login system
- 📧 **OTP-based Password Recovery** — forgot password → OTP sent via email → OTP verification → set new password
- 📝 **Notes Management (CRUD)** — create, edit, view, and delete notes
- ⭐ **Favorites** — mark/unmark notes as favorite for quick access
- 🔍 **Search** — search notes by title/content
- 🗂️ **Category Management** — organize notes into categories (create, edit, delete)
- 👤 **User Profile & Settings** — update profile information and account settings
- 🛡️ **Role-Based Access Control** — separate permissions for `admin` and `viewer` roles using Laravel Gates
- 👥 **Admin User Management** — admins can view, search, and remove users
- 🎨 **Responsive UI** — built with Blade templates and BootStrap


---

## 🛠️ Tech Stack

| Layer            | Technology                          |
|-------------------|--------------------------------------|
| Backend           | Laravel 13 (PHP 8.3)                |
| Frontend          | Blade Templates, TailwindCSS 4      |
| Build Tool        | Vite                                 |
| Database          | MySQL 
| Authentication    | Laravel Auth + Custom OTP Middleware |

---

## 📸 Screenshots

> Add your project screenshots to the `docs/screenshots/` folder using the file names below,
> and they will automatically show up here on GitHub.

| Login Page | Register Page |
|:---:|:---:|
| ![Login][https://github.com/ALI-RAZA816/laravel-full-stack-notes-app/blob/57a38c807f65e635dff567f906973484f4201910/login-screehshot.PNG] | ![Register](docs/screenshots/register.png) |

| Dashboard | Add / Edit Note |
|:---:|:---:|
| ![Dashboard](docs/screenshots/dashboard.png) | ![Add Note](docs/screenshots/addnote.png) |

| Category Management | Settings |
|:---:|:---:|
| ![Categories](docs/screenshots/categories.png) | ![Settings](docs/screenshots/settings.png) |

| User Profile | Admin - Users |
|:---:|:---:|
| ![Profile](docs/screenshots/profile.png) | ![Users](docs/screenshots/users.png) |

| Forgot Password (OTP) | Reset Password |
|:---:|:---:|
| ![OTP](docs/screenshots/otp.png) | ![Reset Password](docs/screenshots/reset-password.png) |

---

## 📂 Project Structure (key folders)

```
laravel-full-stack-notes-app/
├── app/
│   ├── Http/
│   │   ├── Controllers/       # NoteController, UserController, CategoryController, ResetController
│   │   └── Middleware/        # EnsureOtpRequest, OtpVarified
│   ├── Models/                 # User, Note, Category
│   └── Providers/               # AppServiceProvider (role/permission Gates)
├── database/
│   └── migrations/             # users, categories, notes, otps
├── resources/
│   └── views/                  # Blade templates (login, register, dashboard, notes, etc.)
├── routes/
│   └── web.php                 # All application routes
└── docs/
    └── screenshots/             # Project screenshots (see above)
```

---

## ⚙️ Database Schema (overview)

| Table        | Key Fields                                                                 |
|--------------|-----------------------------------------------------------------------------|
| `users`      | name, email, password, role (`admin`/`viewer`), status, profile, phone     |
| `categories` | title                                                                        |
| `notes`      | title, content, category_id, user_id, favourate                            |
| `otps`       | user_id, otp, expires_at                                                    |

---

## 🔑 Roles & Permissions

The app uses Laravel **Gates** for authorization:

- `islogin` — user must be authenticated
- `isAdmin` — user role must be `admin` (required for category management & user management)
- `isNotes` — user can only access their own notes/profile

---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.3
- Composer
- Node.js & npm
- SQLite (or MySQL, if you switch the DB driver)

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/<your-username>/laravel-full-stack-notes-app.git
cd laravel-full-stack-notes-app

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies
npm install

# 4. Copy the environment file
cp .env.example .env

# 5. Generate the application key
php artisan key:generate

# 6. Configure your database in the .env file
#    (default is SQLite — create the file if needed)
touch database/database.sqlite

# 7. Run migrations
php artisan migrate

# 8. Build frontend assets
npm run build
```

### Running the App

```bash
# Start the Laravel dev server, queue listener, and Vite together
composer run dev
```

The app will be available at **http://localhost:8000**.

---

## 📧 Mail Configuration (for OTP)

The forgot-password flow sends an OTP via email. Update the following in your `.env` file with
real mail credentials (e.g. Mailtrap, Gmail SMTP) for OTP emails to be delivered:

```
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-username
MAIL_PASSWORD=your-password
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## 🧪 Running Tests

```bash
composer test
```

---

## 🤝 Contributing

Contributions are welcome. Please fork the repository, create a feature branch, and submit a
pull request describing your changes.

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
