<nav x-data="{ open: false }" class="bg-white border-b border-stone-200">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-14">

            <div class="flex items-center gap-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="shrink-0 flex items-center">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="logo">
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex gap-6">
                    <x-nav-link :href="route('projet8')" :active="request()->routeIs('projet8')"
                        class="text-sm text-gray-500 hover:text-gray-900 transition">
                        {{ __('Projet 8') }}
                    </x-nav-link>
                    @auth
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                            class="text-sm text-gray-500 hover:text-gray-900 transition">
                            {{ __('Dashboard') }}
                        </x-nav-link>
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:gap-4">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 px-3 py-1.5 rounded-lg text-sm text-gray-600 hover:bg-stone-100 hover:text-gray-900 transition duration-150 focus:outline-none">
                                <div class="w-7 h-7 rounded-full bg-stone-900 text-white flex items-center justify-center text-xs font-medium">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Déconnexion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                    <div class="flex items-center gap-4">
                        @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">{{ __('Se connecter') }}</a>
                        @endif
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">{{ __('S\'inscrire') }}</a>
                        @endif
                    </div>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-600 hover:bg-stone-100 focus:outline-none transition duration-150">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-stone-100">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('projet8')" :active="request()->routeIs('projet8')">
                {{ __('Projet 8') }}
            </x-responsive-nav-link>
            @auth
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            @endauth
        </div>

        @auth
            <div class="pt-3 pb-3 border-t border-stone-100">
                <div class="px-4 mb-2">
                    <div class="text-sm font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-xs text-gray-400">{{ Auth::user()->email }}</div>
                </div>

                <div class="space-y-1 px-2">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profil') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Déconnexion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth

        @guest
            <div class="pt-3 pb-3 border-t border-stone-100 px-2 space-y-1">
                @if (Route::has('login'))
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Se connecter') }}
                    </x-responsive-nav-link>
                @endif
                @if (Route::has('register'))
                    <x-responsive-nav-link :href="route('register')">
                        {{ __('S\'inscrire') }}
                    </x-responsive-nav-link>
                @endif
            </div>
        @endguest
    </div>
</nav>