<nav x-data="{ open: false }" class="main-nav">
    <!-- Primary Navigation Menu -->
    <div class="nav-container">
        <div class="nav-inner">
            <div class="nav-left">
                <!-- Logo -->
                <div class="nav-logo">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>

                 <!--Title-->
            <div class="w-full text-center text-color-white font-bold text-3xl">
                <h1>Administratie Systeem</h1>
            </div>
            </div>

           

            <!-- Settings Dropdown -->
            <div class="nav-right">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="nav-trigger-btn">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="arrow-icon">
                                <svg class="fill-current" style="height:1rem;width:1rem;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="nav-hamburger">
                <button @click="open = ! open" class="hamburger-btn">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'open': open}" x-bind:class="open ? 'responsive-nav open' : 'responsive-nav'" class="responsive-nav">
        <div class="responsive-nav-links">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="responsive-settings">
            <div class="responsive-user-info">
                <div class="responsive-user-name">{{ Auth::user()->name }}</div>
                <div class="responsive-user-email">{{ Auth::user()->email }}</div>
            </div>

            <div class="responsive-settings-links">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
