# 🚀 LaraAuthpem

**LaraAuthpem** is a Laravel package for **flexible role & permission management**, bringing **attribute-based access
control** to your Laravel applications.  
With LaraAuthpem, you can easily protect routes, controllers, and actions by simply attaching PHP attributes. 🛡️

---

## ✨ Features

- 🔑 Assign multiple roles & permissions to users
- ⚡ Middleware for automatic role & permission checks
- 🧩 Attribute-based access control with PHP 8+ attributes
- 🔒 Protect routes and controllers with minimal boilerplate
- 🛠️ Simple integration with Laravel authentication
- 📦 Service classes to handle role & permission logic

---

## 📦 Installation

Install via Composer:

```bash
composer require muhammadtashfeen/lara-authpem
```

(Optional) Publish the service provider:

```bash
php artisan vendor:publish --provider="MuhammadTashfeen\LaraAuthpem\Providers\AuthServiceProvider"
```

---

## 🔑 User Model Requirements

Your `User` model **must implement** the following methods:

```php
public function getRoles(): array
{
    return ['admin', 'editor']; // example
}

public function getPermissions(): array
{
    return ['view_users', 'create_users']; // example
}
```

> ⚡ How these arrays are populated is **entirely up to you** — they can come from the database, config, or any custom
> logic.  
> The important part is that they **always return arrays** of role names and permission names.

---

## 🚀 Usage

### 🛡️ Middleware Protection

Use the middleware alias `mt.authpem` to protect routes:

```php
Route::middleware(['mt.authpem'])->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});
```

### 🧩 Attribute Usage (Controller-Level)

```php
use MuhammadTashfeen\LaraAuthpem\Attributes\HasRole;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasPermission;

#[HasRole('admin')]
#[HasPermission('view_users')]
public function index() {
    // Only accessible by admins with view_users permission
}
```

---

## 🧪 Testing

Run PHPUnit tests:

```bash
vendor/bin/phpunit
```

---

## ⚙️ Compatibility

- PHP: ^8.3
- Laravel: 10.x
- PHPUnit: ^11.0 (for testing)
- Orchestra Testbench: ^9.5 (for testing)
- Laravel Pint: dev-main (optional, for code style)

---

## 🤝 Contributing

Contributions are welcome!  
Feel free to open issues or submit PRs to improve LaraAuthpem.

---

## 📄 License

LaraAuthpem is open-sourced software licensed under the **MIT license**.
