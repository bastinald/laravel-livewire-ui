# Laravel Livewire Ui

This package will create UI & auth scaffolding for your next Laravel project through a single command. It does so using Laravel Livewire & Bootstrap 5. Think of it as a minimal, modernized version of the old Laravel UI package. This is ideal for people who prefer Bootstrap over Tailwind, and don't need all the extra's that come with Jetstream.

## Documentation

- [Requirements](#requirements)
- [Packages Used](#packages-used)
- [Installation](#installation)
- [Commands](#commands)
    - [Making UI](#making-ui)
    - [Making Auth](#making-auth)
- [Publishing Stubs](#publishing-stubs)

## Requirements

- A server with Laravel 8 support
- NPM installed on the dev machine

## Packages Used

The following packages are used by this package, so you may want to become familiar with them:

- [Laravel Automatic Migrations](https://github.com/bastinald/laravel-automatic-migrations)
- [Laravel Livewire Modals](https://github.com/bastinald/laravel-livewire-modals)
- [Laravel Livewire Routes](https://github.com/bastinald/laravel-livewire-routes)
- [Laravel Livewire Toasts](https://github.com/bastinald/laravel-livewire-toasts)
- [Honey](https://github.com/lukeraymonddowning/honey)

## Installation

This package was designed to work with new Laravel projects.

Make a Laravel project via Valet, Docker, or whatever you prefer:

```console
laravel new my-project
```

Configure your `.env` APP, DB, and MAIL values:

```env
APP_*
DB_*
MAIL_*
```

Require the package via composer:

```console
composer require bastinald/laravel-livewire-ui
```

Make UI scaffolding:

```console
php artisan make:ui
```

Or, make UI scaffolding including auth:

```console
php artisan make:ui -a
```

## Commands

### Making UI

Make UI scaffolding including the layouts, assets, NPM config, etc.:

```console
php artisan make:ui {--a|--auth} {--force}
```

Use the `-a` option to make auth at the same time.

### Making Auth

Make auth scaffolding including login, register, password resets, etc.:

```console
php artisan make:auth {--force}
```

Only run this command after making UI if you did not use the `-a` option.

### Clearing the Log

Delete the `laravel.log` file:

```console
php artisan log:clear
```

## Publishing Stubs

Use your own UI & auth stubs by publishing package files:

```console
php artisan vendor:publish --tag=laravel-livewire-ui
```

Update the `stub_path` in `config/laravel-livewire-ui.php`:

```php
'stub_path' => resource_path('stubs/vendor/laravel-livewire-ui'),
```

Now edit the stub files inside `resources/stubs/vendor/laravel-livewire-ui`. The commands will now use these stub files to make UI & auth.
