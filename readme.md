# Laravel Livewire Ui

This package provides Laravel Livewire & Bootstrap UI, Auth, & CRUD scaffolding commands to make your development speeds blazing fast. With it, you can generate full, preconfigured Bootstrap UI, complete Auth scaffolding including password resets and profile updating, and Create, Read, Update, and Delete operations. The CRUD files even have searching, sorting, and filtering. This package also comes with full PWA capabilities.

<a href="https://www.youtube.com/watch?v=duycNbSkmCc"><img src="https://i.imgur.com/EFVaEtn.png"></a>

## Documentation

- [Requirements](#requirements)
- [Packages Used](#packages-used)
- [Installation](#installation)
- [Commands](#commands)
    - [Making UI](#making-ui)
    - [Making Auth](#making-auth)
    - [Making CRUD](#making-crud)
- [Publishing Stubs](#publishing-stubs)

## Requirements

- a server with Laravel 8 support
- NPM installed on the dev machine

## Packages Used

The following packages are used by this package, so you may want to become familiar with them:

- [Laravel Automatic Migrations](https://github.com/bastinald/laravel-automatic-migrations)
- [Laravel Bootstrap Components](https://github.com/bastinald/laravel-bootstrap-components)
- [Laravel Livewire Loader](https://github.com/bastinald/laravel-livewire-loader)
- [Laravel Livewire Modals](https://github.com/bastinald/laravel-livewire-modals)
- [Laravel Livewire Routes](https://github.com/bastinald/laravel-livewire-routes)
- [Laravel Livewire Toasts](https://github.com/bastinald/laravel-livewire-toasts)
- [Laravel Timezone](https://github.com/jamesmills/laravel-timezone)
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

Make base UI scaffolding:

```console
php artisan make:ui
```

Or, make UI scaffolding including Auth:

```console
php artisan make:ui -a
```

## Commands

### Making UI

Make UI scaffolding including the layouts, assets, NPM config, etc.:

```console
php artisan make:ui {--a|--auth} {--force}
```

Use the `-a` option to make Auth at the same time.

### Making Auth

Make Auth scaffolding including login, register, password resets, etc.:

```console
php artisan make:auth {--force}
```

Only run this command after making UI if you did not use the `-a` option.

### Making CRUD

Make CRUD scaffolding for a model including Create, Read, Update, etc.:

```console
php artisan make:crud {path} {--model=} {--force}
```

The `path` is the path the components and views will use e.g.:

```console
php artisan make:crud Users
```

You can also make CRUD inside a subdirectory e.g.: 

```console
php artisan make:crud Admin/Users
```

If the model does not exist, it will be created automatically. The package is smart enough to know that the model would be `User` in the two examples above.

You can also specify the model class you wish to use as well:

```console
php artisan make:crud Admin/Users --model=Admin/User
```

This is handy if you want the model in a subdirectory, or if the name is completely different from the CRUD path.

### Clearing the Log

Delete the `laravel.log` file:

```console
php artisan log:clear
```

## Publishing Stubs

Use your own Auth & CRUD stubs by publishing package files:

```console
php artisan vendor:publish --tag=laravel-livewire-ui
```

Update the `stub_path` in `config/laravel-livewire-ui.php`:

```php
'stub_path' => resource_path('stubs/vendor/laravel-livewire-ui'),
```

Now edit the stub files inside `resources/stubs/vendor/laravel-livewire-ui`. The commands will now use these stub files to make Auth & CRUD.
