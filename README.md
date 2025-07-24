
# SpatieScope

A sleek, modern **ViLT Stack** (Vue + Laravel) app for testing and managing **Roles and Permissions** with the [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission/) package.

Perfect for developers who want to **build, test, and demo** complex permission systems — fast.  
Or for those who want to look busy while actually sipping a coconut on the beach.

---

## 🚀 Features

- **Create & Manage Roles & Permissions** – Full CRUD via Laravel backend and Vue frontend.
- **Assign Roles to Users** – Easily assign roles with a clean UI.
- **Direct Permissions** – Give specific permissions directly to users.
- **Real-Time Access Testing** – Built-in permission checker: "Can this user do that?" — answered instantly.
- **Vue 3 + TypeScript** – Built with Composition API and `<script setup>` syntax.
- **ShadCN Vue Components** – Elegant, accessible UI with a minimalist design.
- **Laravel API Backend** – Secure, RESTful API for all permission operations.
- **Role-Permission Matrix** – Visualize which roles have which permissions.
- **Multi-Guard Support** – Works with `web`, `api`, or any custom guard.

---

## 🏗️ Tech Stack (ViLT)

- **V**ue 3 (Composition API + TypeScript)
- **L**aravel 10+
- **T**ailwind CSS (via ShadCN Vue)
- **Spatie Laravel Permission** – The gold standard for Laravel ACL.

---

## 🧪 Use Case

You're asked to implement a complex roles and permissions system.  
You say: "This will take about 2 days."  
Then you clone SpatieScope, customize it in 2 hours, and spend the rest of the week at the beach.

That’s the dream. This app makes it real.

---

## 📦 Installation

### 1. Clone the repo
```bash
git clone https://github.com/EslamKamel89/SpatieRole.git
cd SpatieRole
```

### 2. Install Laravel dependencies
```bash
composer install
cp .env.example .env
php artisan key:generate
```

### 3. Setup Database
Create a database and update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=spatiescope
DB_USERNAME=root
DB_PASSWORD=
```

Run migrations and seed roles/permissions:
```bash
php artisan migrate --seed
```

### 4. Install Vue & Dependencies
```bash
npm install
```

### 5. Build or Develop
For development:
```bash
npm run dev
```

For production build:
```bash
npm run build
```

### 6. Serve the app
```bash
php artisan serve
```

Visit `http://localhost:8000`

---

## 🔐 Spatie Permission Setup

Make sure your `User` model uses the `HasRoles` trait:

```php
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
}
```

Permissions and roles are managed via the UI or using Artisan:

```bash
php artisan permission:create-role admin web
php artisan permission:create-permission edit-posts web
```

---

## 🌟 Star the Repo

If this saves you time (and helps you fake a 2-day task into a 2-hour one), please star the repo:

👉 https://github.com/EslamKamel89/SpatieRole

---

## 🤝 Contributing

PRs are welcome! Whether it's UI improvements, new features, or better docs — every contribution helps.

---

## 📄 License

MIT. Do whatever you want. Just don’t blame me if your team lead finds out you’re on vacation.
```
