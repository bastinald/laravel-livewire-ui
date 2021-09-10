<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <i class="fab fa-fw fa-laravel text-primary"></i> {{ config('app.name') }}
        </a>

        <button type="button" data-bs-toggle="collapse" data-bs-target="#nav" class="navbar-toggler">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="nav" class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto">
                @guest
                    <a href="{{ route('login') }}"
                        class="nav-link {{ Route::is('login') ? 'active' : '' }}">{{ __('Login') }}</a>

                    <a href="{{ route('register') }}"
                        class="nav-link {{ Route::is('register') ? 'active' : '' }}">{{ __('Register') }}</a>
                @else
                    <div class="nav-item dropdown">
                        <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle">
                            <i class="fas fa-fw fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button type="button" wire:click="$emit('showModal', 'auth.profile-update')"
                                class="dropdown-item">{{ __('Update Profile') }}</button>

                            <button type="button" wire:click="$emit('showModal', 'auth.password-change')"
                                class="dropdown-item">{{ __('Change Password') }}</button>

                            <a href="{{ route('logout') }}" class="dropdown-item">{{ __('Logout') }}</a>
                        </div>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>
