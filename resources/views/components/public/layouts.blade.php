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
    <div class="mr-4 cursor-pointer">
        <a wire:navigate href="{{ route('home') }}"><h2 class="font-bold align-left"> {{ __('BlogPost') }}</h2></a>
    </div>
    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:navbar.item wire:navigate href="{{ route('home') }}"
                        :current="request()->routeIs('home')">{{ __('Home') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="{{ route('posts.index') }}"
                        :current="request()->routeIs('posts.index')">{{ __('Posts') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="{{ route('categories.index') }}"
                        :current="request()->routeIs('categories.index')">{{ __('Categories') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="{{ route('authors.index') }}"
                        :current="request()->routeIs('authors.index')">{{ __('Authors') }}</flux:navbar.item>
        <flux:navbar.item wire:navigate href="{{ route('membership.index') }}"
                        :current="request()->routeIs('membership.index')">{{ __('Membership') }}</flux:navbar.item>

    </flux:navbar>
    <flux:spacer/>
    <flux:navbar class="me-4">

        {{-- login and signup buttons      --}}
        @if(Auth::check())
            <flux:dropdown class="max-lg:hidden" position="top" align="start">
                @if(Auth::user()->avatar)
                    <flux:profile avatar="{{ asset('storage/' . Auth::user()->avatar) }}"
                                  name="{{ Auth::user()->name }}"/>
                @else
                    <flux:profile name="{{ Auth::user()->name }}"/>
                @endif
                <flux:menu>
                    <flux:menu.group>
                        <flux:menu.item href="{{ '/admin' }}"
                                        icon="home">{{ __('Dashboard') }}</flux:menu.item>
                        <flux:menu.item wire:navigate href="{{ route('settings.profile') }}"
                                        icon="cog">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.group>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <flux:menu.item type="submit" href="" icon="arrow-right-start-on-rectangle"
                                        class="cursor-pointer"
                        >
                            {{ __('Logout') }}
                        </flux:menu.item>
                    </form>

                </flux:menu>
            </flux:dropdown>
        @else
            {{-- show auth button if user not auth for lg windows --}}
            <flux:button class="max-lg:hidden" wire:navigate href="{{ route('login') }}"
                         variant="primary"
            >
                {{ __('Login') }}
            </flux:button>

        @endif

        {{-- light and dark mode switcher     --}}
        <flux:separator class="mx-2 max-lg:hidden" vertical/>
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
        {{-- sidebar toggle icon --}}
        <flux:sidebar.toggle class="lg:hidden" icon="grid" inset="right"/>
    </flux:navbar>

</flux:header>
{{-- mobile sidebar toggle --}}
<flux:sidebar stashable sticky
              class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border rtl:border-r-0 rtl:border-l border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark"/>
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden"/>
    <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc."
                class="px-2 hidden dark:flex"/>
    <flux:navlist variant="outline">
        <flux:navlist.item icon="home" href="#" current>Home</flux:navlist.item>
        <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item>
        <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
        <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item>
        <flux:navlist.group expandable heading="Favorites" class="max-lg:hidden">
            <flux:navlist.item href="#">Marketing site</flux:navlist.item>
            <flux:navlist.item href="#">Android app</flux:navlist.item>
            <flux:navlist.item href="#">Brand guidelines</flux:navlist.item>
        </flux:navlist.group>
    </flux:navlist>
    <flux:spacer/>
    <flux:navlist variant="outline">
        <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
        <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
    </flux:navlist>
</flux:sidebar>


{{-- main content --}}

{{ $slot }}


<!-- Footer -->
<footer class="bg-zinc-100 dark:bg-zinc-900 border-t border-zinc-200 dark:border-zinc-700 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-600 dark:text-gray-400">
        <flux:text>
            &copy; 2025 Your Company Name. All rights reserved.
        </flux:text>
        <div class="mt-4 space-x-6">
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Privacy Policy') }}
            </flux:link>
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Terms of Service') }}
            </flux:link>
            <flux:link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400">
                {{ __('Contact') }}
            </flux:link>
        </div>
    </div>
</footer>
 </div>
</div>

@fluxScripts
@stack('carousel')
</body>

</html>
