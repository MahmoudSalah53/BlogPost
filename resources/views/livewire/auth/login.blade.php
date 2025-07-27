<div class="w-full max-w-md mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1
            class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-indigo-500 to-purple-600">
            {{ __('Welcome Back') }}
        </h1>
    </div>

    <!-- Card -->
    <div class="bg-white dark:bg-zinc-900 shadow-2xl rounded-2xl p-8 border border-slate-200 dark:border-zinc-700">
        <x-auth-session-status class="mb-6 text-center" :status="session('status')" />

        <form wire:submit="login" class="space-y-6">
            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                    {{ __('Email address') }}
                </label>
                <flux:input wire:model="email" type="email" required autocomplete="email"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="you@example.com" />
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                        {{ __('Password') }}
                    </label>
                    @if (Route::has('password.request'))
                        <flux:link :href="route('password.request')" wire:navigate
                            class="text-xs text-indigo-500 hover:text-indigo-600 dark:text-indigo-400">
                            {{ __('Forgot?') }}
                        </flux:link>
                    @endif
                </div>
                <flux:input wire:model="password" type="password" required autocomplete="current-password"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="••••••••" viewable />
                @error('password')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


            <!-- Remember -->
            <div class="flex items-center">
                <flux:checkbox wire:model="remember" :label="__('Remember me')" />
            </div>

            <!-- Submit -->
            <flux:button type="submit" variant="primary"
                class="w-full !bg-gradient-to-r !from-indigo-600 !to-purple-600 !border-0 !rounded-xl !text-white !font-semibold !shadow-lg hover:opacity-90">
                {{ __('Log in') }}
            </flux:button>
        </form>

        <!-- Footer -->
        @if (Route::has('register'))
            <div class="text-center text-xs text-slate-500 dark:text-slate-400 mt-6">
                {{ __('No account yet?') }}
                <flux:link :href="route('register')" wire:navigate
                    class="font-semibold text-indigo-600 dark:text-indigo-400">
                    {{ __('Create one') }}
                </flux:link>
            </div>
        @endif
    </div>
</div>