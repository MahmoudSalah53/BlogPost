<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email" />

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                <div>
                    <flux:text class="mt-4">
                        {{ __('Your email address is unverified.') }}

                        <flux:link class="text-sm cursor-pointer"
                            wire:click.prevent="resendVerificationNotification">
                            {{ __('Click here to re-send the verification email.') }}
                        </flux:link>
                    </flux:text>

                    @if (session('status') === 'verification-link-sent')
                    <flux:text class="mt-2 font-medium !dark:text-green-400 !text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </flux:text>
                    @endif
                </div>
                @endif
            </div>

            <div class="mt-2 flex items-end">
    @if ($avatar)
        @if (is_string($avatar))
            <img src="{{ asset('storage/' . $avatar) }}" class="w-12 h-12 rounded-full mr-2 object-cover" />
        @else
            <img src="{{ $avatar->temporaryUrl() }}" class="w-12 h-12 rounded-full mr-2 object-cover" />
        @endif
    @else
        <div class="w-12 h-12 rounded-full bg-gray-200 mr-2"></div>
    @endif

    <div>
        <input type="file" wire:model="avatar" id="avatar" class="hidden" />
        <label for="avatar" class="cursor-pointer">
            <span class="px-4 py-2 bg-blue-500 text-white rounded-md">Choose an image</span>
        </label>
        <div wire:loading wire:target="avatar">loading...</div>
    </div>
</div>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="profile-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>

        <livewire:settings.delete-user-form />
    </x-settings.layout>
</section>