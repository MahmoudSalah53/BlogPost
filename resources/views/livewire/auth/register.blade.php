<div class="w-full max-w-md mx-auto">
    <!-- Header -->
    <div class="text-center mb-8">
        <h1 class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-500 to-pink-600">
            {{ __('Create Account') }}
        </h1>
    </div>

    <!-- Card -->
    <div class="bg-white dark:bg-zinc-900 shadow-2xl rounded-2xl p-8 border border-slate-200 dark:border-zinc-700">
        <x-auth-session-status class="mb-6 text-center" :status="session('status')" />

        <form wire:submit="register" class="space-y-6">
            <!-- Name -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                    {{ __('Full name') }}
                </label>
                <flux:input
                    wire:model="name"
                    type="text"
                    required
                    autocomplete="name"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="John Doe"
                />
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                    {{ __('Email address') }}
                </label>
                <flux:input
                    wire:model="email"
                    type="email"
                    required
                    autocomplete="email"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="you@example.com"
                />
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                    {{ __('Password') }}
                </label>
                <flux:input
                    wire:model="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="••••••••"
                    viewable
                />
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">
                    {{ __('Confirm password') }}
                </label>
                <flux:input
                    wire:model="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    class="w-full rounded-xl border-slate-300 dark:border-zinc-600 focus:ring-purple-500 focus:border-purple-500"
                    placeholder="••••••••"
                    viewable
                />
            </div>

            <!-- Submit -->
            <flux:button
                type="submit"
                variant="primary"
                class="w-full !bg-gradient-to-r !from-purple-600 !to-pink-600 !border-0 !rounded-xl !text-white !font-semibold !shadow-lg hover:opacity-90"
            >
                {{ __('Create account') }}
            </flux:button>
        </form>

        <!-- Footer -->
        <div class="text-center text-xs text-slate-500 dark:text-slate-400 mt-6">
            {{ __('Already have an account?') }}
            <flux:link :href="route('login')" wire:navigate class="font-semibold text-purple-600 dark:text-purple-400">
                {{ __('Log in') }}
            </flux:link>
        </div>
    </div>
</div>