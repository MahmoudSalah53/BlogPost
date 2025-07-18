<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $role;
    public $currentAvatar;
    public $avatar;
    public $bio;

    /**
     * Mount the component.
     */
    public function mount (): void
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
        $this->currentAvatar = $this->user->avatar;
        $this->bio = $this->user->bio;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation (): void
    {

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user->id),
            ],
            'role' => ['required', 'string', Rule::in(['reader', 'author'])],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'bio' => 'nullable|string',
        ]);

        // upload user avatar
        if ( $this->avatar ) {
            $path = $this->avatar->store('avatars', 'public');
            $validated['avatar'] = $path;
            $this->currentAvatar = $path;
            $this->avatar = null;
        } else {
            $validated['avatar'] = $this->currentAvatar;
        }
        $this->user->fill($validated);

        if ( $this->user->isDirty('email') ) {
            $this->user->email_verified_at = null;
        }

        $this->user->save();

        $this->dispatch('profile-updated', name: $this->user->name);

        $this->redirect(route('settings.profile'), true);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification (): void
    {

        if ( $this->user->hasVerifiedEmail() ) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $this->user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}
