# Skywalker Labs UI

[![Latest Version on Packagist](https://img.shields.io/packagist/v/skywalker-labs/ui.svg?style=flat-square)](https://packagist.org/packages/skywalker-labs/ui)
[![Total Downloads](https://img.shields.io/packagist/dt/skywalker-labs/ui.svg?style=flat-square)](https://packagist.org/packages/skywalker-labs/ui)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/skywalker-labs/ui.svg?style=flat-square)](https://packagist.org/packages/skywalker-labs/ui)
[![License](https://img.shields.io/packagist/l/skywalker-labs/ui.svg?style=flat-square)](https://packagist.org/packages/skywalker-labs/ui)

A powerful, incredibly simple, and lightning-fast frontend scaffolding package for Laravel applications by **Skywalker Labs**. 

Whether you are a Junior Developer starting your first project or a Senior Engineer looking for a rapid and proven frontend foundation, **Skywalker UI** gives you everything you need. It provides a robust starting point using [Bootstrap 5](https://getbootstrap.com/), [React](https://reactjs.org/), or [Vue](https://vuejs.org/).

With a single command, you can scaffold complete authentication flows, responsive views, and a modern Vite build pipeline! 🚀

---

## 🌟 Key Features

- **Instant Authentication System**: Generates Login, Registration, Password Reset, and Verification flows in seconds.
- **Frontend Presets**: Choose seamlessly between Bootstrap, Vue.js, or React.js.
- **Vite Integration**: Out-of-the-box hot-module replacement (HMR) and insanely fast asset compilation.
- **Clean Architecture**: Generates fully customizable Blade templates (`resources/views/auth`).
- **Beginner Friendly**: No complex logic hidden from you. All controllers and views are published to your app so you can learn and customize freely!

---

## ⚡ Installation Guide

You can install the package effortlessly using Composer. Open your terminal at the root of your Laravel project:

```bash
composer require skywalker-labs/ui
```

> **Note:** This package is fully compatible with Laravel 9.x, 10.x, 11.x, and 12.x out-of-the-box.

---

## 🛠️ Usage & Scaffolding

Once installed, you can use the newly available `ui` Artisan command to install the frontend scaffolding of your choice.

### 1. Basic Frontend Scaffolding
If you only want to set up the CSS/JS framework (without authentication views), run one of the following commands:

```bash
# For a clean Bootstrap 5 setup
php artisan ui bootstrap

# For a modern Vue.js setup
php artisan ui vue

# For a robust React.js setup
php artisan ui react
```

### 2. Full Authentication Scaffolding (Recommended) 🔐
Most projects require a secure login system. You can generate fully functioning login, registration, and dashboard interfaces by appending the `--auth` flag. 

Run *one* of the following commands:

```bash
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth
```

**What does the `--auth` flag do?**
- It publishes `HomeController.php` to handle your dashboard routes.
- It injects `Auth::routes();` into your `routes/web.php` file automatically.
- It creates a beautiful `layouts/app.blade.php` master template.
- It scaffolds all the necessary forms in `resources/views/auth/`.

### 3. Compile Your Assets
After choosing your preset, you must install the NPM packages and compile your fresh assets using Vite:

```bash
npm install
npm run dev
```

*For production deployment, you would run `npm run build` instead.*

---

## 📝 Customizing Your Setup

Skywalker UI is designed to give you 100% control over your application.

### Understanding the Routes
When you run the `--auth` command, this line is added to `routes/web.php`:

```php
Auth::routes();
```
This single line registers all the standard authentication endpoints (`/login`, `/register`, `/password/reset`, etc.).

### Modifying the Views
All the generated views are placed directly in your `resources/views/` directory. You can easily modify the HTML or Blade structure by editing these files:
- `resources/views/layouts/app.blade.php` (The main wrapper/navbar)
- `resources/views/auth/login.blade.php`
- `resources/views/auth/register.blade.php`

### Writing CSS/SASS
We natively support **Vite**, the high-performance build tool utilized across modern Laravel systems. Configuration defaults compile your starting `resources/sass/app.scss` file seamlessly. The generated output is neatly bundled and instantly accessible via your browser upon hitting `npm run dev`.

### Writing JavaScript
Whether you drop in raw ES6 logic, single-file Vue components (`ExampleComponent.vue`), or React files, Vite takes your `resources/js/app.js` file, integrates Bootstrap / Vue framework dependencies natively, and outputs rapid, hot-reloading code immediately.

---

## 🎨 Extending Presets (Advanced)

As a package developer or heavily customized team, you can easily write your own custom presets using Laravel's powerful `macroable` system directly from your Service Providers!

Add this to the `boot` method of your `AppServiceProvider`:

```php
use Skywalker\Ui\Console\Commands\UiCommand;

UiCommand::macro('nextjs', function (UiCommand $command) {
    // Write logic to scaffold your custom frontend...
    $command->info('Next.js scaffolding installed successfully.');
});
```

Execute your custom macro seamlessly from the terminal:
```bash
php artisan ui nextjs
```

---

## 🧪 Testing

We ensure Skywalker UI remains stable via extensive testing. Run the test suite leveraging Composer:

```bash
composer test
```
*or directly via PHPUnit:*
```bash
vendor/bin/phpunit
```

## 📈 Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently in the `1.x` branch.

## 🤝 Contributing

We love the community! Please see [CONTRIBUTING](CONTRIBUTING.md) for details on how to write code, submit Pull Requests, and help improve the Skywalker UI ecosystem.

## 🛡️ Security Vulnerabilities

If you discover any security-related issues, please email `ermradulsharma0@gmail.com` directly instead of using the public issue tracker. Our [Security Policy](SECURITY.md) provides detailed information on disclosure.

## 🎖️ Credits

- [Mradul Sharma](https://github.com/ermradulsharma)
- [Skywalker Labs Team](https://skywalker-labs.com/)
- [All Contributors](../../contributors)

## 📄 License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
