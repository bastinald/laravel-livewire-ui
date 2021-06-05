# Laravel Livewire Ui

Laravel Livewire auth & CRUD starter kit. This package brings back the classic `make:auth` command to create the auth scaffolding for your next Laravel project. This includes login, register, forgot password, profile updating, password changing, and more. This package also has a `make:crud` command which will scaffold index, create, read, update, & delete operations for your models. The indexes even have searching, sorting, and filtering included.

It uses Bootstrap 5 and promotes the usage of full page Livewire components rather than traditional controller-based CRUD. The commands also generate real code, keeping you in full control.

### Packages Used

The following packages are used by this package, so you may want to become familiar with them. While using these packages is promoted and recommended, it is are entirely optional.

- [Laravel Automatic Migrations](https://github.com/bastinald/laravel-automatic-migrations)
- [Laravel Bootstrap Components](https://github.com/bastinald/laravel-bootstrap-components)
- [Laravel Livewire Routes](https://github.com/bastinald/laravel-livewire-routes)
- [Honey](https://github.com/lukeraymonddowning/honey)

### Documentation

- [Installation](#installation)
- [Commands](#commands)
    - [Make Auth](#make-auth)
    - [Make CRUD](#make-crud)
- [Publishing Stubs](#publishing-stubs)
- [Dynamic Modals](#dynamic-modals)
    - [Showing Modals](#showing-modals)
    - [Hiding Modals](#hiding-modals)
- [Traits](#traits)
    - [WithModel](#withmodel)

## Installation

Require the package via composer:

```console
composer require bastinald/laravel-livewire-ui
```

Generate auth scaffolding:

```console
php artisan make:auth
```

## Commands

### Make Auth

Make auth scaffolding including login, register, password resets, etc:

```console
php artisan make:auth {--force}
```

### Make CRUD

Make CRUD scaffolding for a model including create, read, update, etc:

```console
php artisan make:crud {model} {--force}
```

## Publishing Stubs

Use your own auth & CRUD stubs by publishing package files:

```console
php artisan vendor:publish --tag=laravel-livewire-ui
```

Update the `stub_path` in `config/laravel-livewire-ui.php`:

```php
'stub_path' => base_path('resources/stubs/vendor/laravel-livewire-ui'),
```

Now just edit the stub files inside `resources/stubs/vendor/laravel-livewire-ui` to your needs. The commands will now use these stub files to make auth & CRUD.

## Dynamic Modals

This package contains a dynamic modal component you can use to display Livewire components inside of Bootstrap 5 modals.

To use a dynamic modal, make a Livewire component with a view that has a `title` section, and uses the `x-layouts.modal` component. Be sure to add a `modal-body` and `modal-footer` inside of it:

```html
@section('title', __('Modal Title'))

<x-layouts.modal>
    <div class="modal-body">
        {{ __('I am the modal body.' }}
    </div>
    <div class="modal-footer">
        <x-bs::button type="button" :label="__('Close')" color="secondary"
            wire:click="$emit('hideModal')"/>
    </div>
</x-layouts.modal>
```

### Showing Modals

To show a modal, emit the `showModal` event via your Livewire views:

```html
<x-bs::button type="button" icon="eye" :title="__('Read')" 
    wire:click="$emit('showModal', 'users.read', {{ $user->id }})"/>
```

Or, directly inside your Livewire components:

```php
$this->emit('showModal', 'users.read', $this->user->id);
```

The second parameter contains the Livewire component alias. All parameters after that will be passed to the component `mount` method:

```php
use App\Models\User;
use Livewire\Component;

class Read extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
}
```

### Hiding Modals

Hiding the currently open modal can be done by emitting the `hideModal` event.

You can hide modals from your Livewire views:

```html
<x-bs::button type="button" :label="__('Close')" color="secondary"
    wire:click="$emit('hideModal')"/>
```

Or, directly inside your Livewire components:

```php
$this->emit('hideModal');
```

## Traits

### WithModel

This trait allows you to easily manage your Livewire component form data through a single `model` property array. This eliminates the need to micromanage a ton of properties inside your Livewire components.

To use it, just prepend `model.` to your `wire:model` form input names:

```html
<x-bs::input type="text" :label="__('First Name')"
    wire:model.defer="model.first_name"/>

<x-bs::input type="text" :label="__('Last Name')"
    wire:model.defer="model.last_name"/>
```

Getting all form data as an array:

```php
$this->getModel();
```

Getting a single value:

```php
// make the default value "Henry"
$this->getModel('first_name', 'Henry');
```

Getting an array of values:

```php
// passing an array always returns an array
$this->getModel(['first_name', 'last_name']); 
```

Setting an array of values:

```php
$this->setModel([
    'first_name' => 'Henry', 
    'last_name' => 'Ford',
]);
```

Setting a single value:

```php
$this->setModel('first_name', 'Henry');
```

Resetting the `model` property:

```php
$this->resetModel();
```

Validating the `model` property:

```php
$this->validateModel([
    'first_name' => 'required',
    'last_name' => 'required',
]);
```

The `validateModel` method can also use the rules from your component `rules` method if it exists and contains an array of rules. In this case, you won't need to pass anything to the `validateModel` method.
