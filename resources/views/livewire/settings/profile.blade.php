<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
        <form wire:submit="updateProfileInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name"/>

            <div>
                <flux:input wire:model="email" :label="__('Email')" type="email" required autocomplete="email"/>

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

            {{-- User role --}}
            <div class="mt-2">
                <flux:label for="role">{{ __('User Role') }}</flux:label>
                <flux:select class="mt-1" id="role" wire:model="role" placeholder="Choose role ...">
                    <flux:select.option value="reader">Reader</flux:select.option>
                    <flux:select.option value="author">Author</flux:select.option>
                </flux:select>
                <flux:error name="role"/>
            </div>

            {{--  Upload user avatar and prview it  --}}
            <div class="mt-2 flex items-end">
                @if ($currentAvatar)
                    <img class="w-[60px] h-[60px] rounded-lg mr-1.5 shadow object-cover border-2 border-yellow-500"
                         src="{{ asset('storage/' . $currentAvatar) }}" alt="">
                @endif
                @if ($avatar)
                    <img class="w-[60px] h-[60px] rounded-lg mr-1.5 shadow object-cover border-2 border-emerald-500"
                         src="{{ $avatar->temporaryUrl() }}" alt="">
                @endif

                <flux:input type="file" :label="__('Avatar')" wire:model="avatar"/>
                <flux:icon.loading class="size-4 ml-1.5 mb-2.5" wire:loading wire:target="avatar"/>


            </div>

            {{--  User bio section --}}
            <div>
                <flux:textarea
                    wire:model="bio"
                    value="hello"
                    label="Bio"
                    placeholder="Write Your Bio Here..."
                />
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

        <livewire:settings.delete-user-form/>
    </x-settings.layout>
</section>
