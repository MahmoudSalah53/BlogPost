<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body class="min-h-screen bg-white dark:bg-zinc-800">
<flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
    <div class="mr-4 cursor-pointer">
        <h2 class="font-bold align-left"> {{ __('BlogPost') }}</h2>
    </div>
    <flux:brand href="{{ route('home') }}" name="Blog Post"
                class="max-lg:hidden! hidden dark:flex "/>
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item href="{{ route('home') }}" current>{{ __('Home') }}</flux:navbar.item>
        <flux:navbar.item href="#">{{ __('Posts') }}</flux:navbar.item>
        <flux:navbar.item href="#">{{ __('Categories') }}</flux:navbar.item>
        <flux:navbar.item href="#">{{ __('Authors') }}</flux:navbar.item>
        <flux:navbar.item href="#">{{ __('Membership') }}</flux:navbar.item>

    </flux:navbar>
    <flux:spacer/>
    <flux:navbar class="me-4">

        {{-- login and signup buttons      --}}
        @if(Auth::check())
            <flux:dropdown position="top" align="start">
                @if(Auth::user()->avatar)
                    <flux:profile avatar="{{ asset('storage/' . Auth::user()->avatar) }}"
                                  name="{{ Auth::user()->name }}"/>
                @else
                    <flux:profile name="{{ Auth::user()->name }}"/>
                @endif
                <flux:menu>
                    <flux:menu.group>
                        <flux:menu.item wire:navigate href="{{ route('profile') }}"
                                        icon="home">{{ __('Dashboard') }}</flux:menu.item>
                        <flux:menu.item wire:navigate href="{{ route('settings.profile') }}"
                                        icon="cog">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.group>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item type="submit" href="" icon="arrow-right-start-on-rectangle"
                                        class="cursor-pointer">Logout
                        </flux:menu.item>
                    </form>

                </flux:menu>
            </flux:dropdown>
        @else
            <flux:button wire:navigate href="{{ route('login') }}" variant="primary">Login</flux:button>
            <flux:button wire:navigate href="{{ route('register') }}">Signup</flux:button>

        @endif

        {{--   light and dark mode switcher     --}}
        <flux:separator class="mx-2" vertical/>
        <div x-data="{ dark: $flux.dark }">
            <flux:button
                x-cloak
                x-show="!dark"
                x-on:click="dark = true; $flux.dark = dark"
                icon="moon"
                variant="subtle"
                aria-label="Enable dark mode"
            />
            <flux:button
                x-cloak
                x-show="dark"
                x-on:click="dark = false; $flux.dark = dark"
                icon="sun"
                variant="subtle"
                aria-label="Disable dark mode"
            />
        </div>
    </flux:navbar>

</flux:header>

{{ $slot }}

<footer class="bg-gray-100 dark:bg-zinc-900 py-8 mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-400">
        <flux:text>
            &copy; 2025 Your Company Name. All rights reserved.
        </flux:text>
        <div class="mt-4 space-x-6">
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                Privacy Policy
            </flux:link>
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                Terms of Service
            </flux:link>
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                Contact
            </flux:link>
        </div>
    </div>
</footer>


@fluxScripts
</body>

</html>
