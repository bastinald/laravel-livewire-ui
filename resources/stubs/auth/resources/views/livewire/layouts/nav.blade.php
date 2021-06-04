<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <x-bs::icon name="laravel" style="brands" color="primary"/>
            {{ config('app.name', 'Laravel') }}
        </a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                @guest
                    <x-bs::nav-item icon="sign-in-alt" :label="__('Login')" route="login"/>
                    <x-bs::nav-item icon="user-plus" :label="__('Register')" route="register"/>
                @else
                    <x-bs::nav-item icon="home" :label="__('Home')" url="/home"/>
                    {{--crud_command_nav_item_hook--}}

                    <x-bs::nav-dropdown icon="user-circle" :label="Auth::user()->name">
                        <x-bs::dropdown-item type="button" :label="__('Update Profile')"
                            wire:click="$emit('showModal', 'auth.profile-update')"/>

                        <x-bs::dropdown-item type="button" :label="__('Change Password')"
                            wire:click="$emit('showModal', 'auth.password-change')"/>

                        <x-bs::dropdown-item type="button" :label="__('Logout')"
                            wire:click="logout"/>
                    </x-bs::nav-dropdown>
                @endguest
            </ul>
        </div>
    </div>
</nav>
