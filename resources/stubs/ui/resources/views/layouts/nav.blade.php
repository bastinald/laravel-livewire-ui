<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <x-bs::link url="/" class="navbar-brand">
            <x-bs::image mix="images/logo.png" :alt="config('app.name')" height="24"/>
        </x-bs::link>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto">
                @if(Route::has('login'))
                    @guest
                        <x-bs::nav-link :label="__('Login')" route="login"/>
                        <x-bs::nav-link :label="__('Register')" route="register"/>
                    @else
                        <x-bs::nav-dropdown icon="user-circle" :label="Auth::user()->name">
                            <x-bs::dropdown-item :label="__('Update Profile')"
                                wire:click="$emit('showModal', 'auth.profile-update')"/>

                            <x-bs::dropdown-item :label="__('Change Password')"
                                wire:click="$emit('showModal', 'auth.password-change')"/>

                            <x-bs::dropdown-item :label="__('Logout')"
                                wire:click="logout"/>
                        </x-bs::nav-dropdown>
                    @endguest
                @endif
            </div>
        </div>
    </div>
</nav>
