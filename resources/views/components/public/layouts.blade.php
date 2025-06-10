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

<!-- Header -->
<flux:header sticky container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left"/>
    <div class="mr-4 cursor-pointer">
        <h2 class="font-bold align-left"> {{ __('BlogPost') }}</h2>
    </div>
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item wire:navigate href="{{ route('home') }}"
                          :current="request()->routeIs('home')">{{ __('Home') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="{{ route('posts') }}"
                          :current="request()->routeIs('posts')">{{ __('Posts') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="#">{{ __('Categories') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="#">{{ __('Authors') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="#">{{ __('Membership') }}</flux:navbar.item>

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

        {{-- light and dark mode switcher     --}}
        <flux:separator class="mx-2" vertical/>
        <div x-data="{ dark: $flux.dark }">
            <flux:button
                x-cloak
                x-show="!dark"
                x-on:click="dark = true; $flux.dark = dark"
                icon="moon"
                variant="subtle"
                aria-label="Enable dark mode"/>
            <flux:button
                x-cloak
                x-show="dark"
                x-on:click="dark = false; $flux.dark = dark"
                icon="sun"
                variant="subtle"
                aria-label="Disable dark mode"/>
        </div>
    </flux:navbar>

</flux:header>


<div class="flex min-h-screen">

    <!-- Sidebar -->
    @if(request()->routeIs('posts'))
        <flux:sidebar sticky stashable
                      class="bg-zinc-50 dark:bg-zinc-900 border-r rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700 w-64">

            <div class="px-4 py-4 space-y-8">

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Categories
                    </flux:text>
                    <flux:navlist variant="ghost" class="space-y-1">
                        <flux:navlist.item icon="list-bullet" current>All</flux:navlist.item>
                        <flux:navlist.item icon="server">Backend</flux:navlist.item>
                        <flux:navlist.item icon="paint-brush">Frontend</flux:navlist.item>
                        <flux:navlist.item icon="server">Database</flux:navlist.item>
                    </flux:navlist>
                </div>

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Tags
                    </flux:text>
                    <div class="flex flex-wrap gap-2">
                        <flux:badge color="blue" clickable>#Laravel</flux:badge>
                        <flux:badge color="emerald" clickable>#PHP</flux:badge>
                        <flux:badge color="purple" clickable>#Vue</flux:badge>
                        <flux:badge color="sky" clickable>#Tailwind</flux:badge>
                        <flux:badge color="amber" clickable>#React</flux:badge>
                        <flux:badge color="rose" clickable>#MySQL</flux:badge>
                    </div>
                </div>

                <div>
                    <flux:text as="h3" size="lg" class="font-bold text-zinc-800 dark:text-white mb-3">
                        Date
                    </flux:text>
                    <flux:navlist variant="ghost" class="space-y-1">
                        <flux:navlist.item icon="clock">Last 24 Hours</flux:navlist.item>
                        <flux:navlist.item icon="calendar-days">This Week</flux:navlist.item>
                        <flux:navlist.item icon="calendar">This Month</flux:navlist.item>
                        <flux:navlist.item icon="calendar">This Year</flux:navlist.item>
                    </flux:navlist>
                </div>

                <div class="pt-2">
                    <flux:button variant="outline" icon="arrow-path">
                        Reset All Filters
                    </flux:button>
                </div>

            </div>
        </flux:sidebar>
    @endif

    <div class="flex-1 flex flex-col">

        <!-- main -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-zinc-100 dark:bg-zinc-900 border-t border-zinc-200 dark:border-zinc-700 py-8">
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

    </div>

</div>

@fluxScripts
</body>

</html>
