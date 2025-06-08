<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
</head>
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

        {{--  login and signup buttons      --}}
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
                        <flux:menu.item href="{{ route('profile') }}" icon="home">{{ __('Dashboard') }}</flux:menu.item>
                        <flux:menu.item href="{{ route('settings.profile') }}"
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
            <flux:button href="{{ route('login') }}" variant="primary">Login</flux:button>
            <flux:button href="{{ route('register') }}">Signup</flux:button>

        @endif

    </flux:navbar>

</flux:header>
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
<flux:main container>
    <flux:heading size="xl" level="1">Good afternoon, Olivia</flux:heading>
    <flux:text class="mt-2 mb-6 text-base">Here's what's new today</flux:text>
    <flux:separator variant="subtle"/>
</flux:main>

@fluxScripts
</body>
</html>
