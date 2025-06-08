<?php

namespace App\Livewire\Auth;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public $role = UserRole::Reader->value;
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register (): void
    {

        $isFirstUser = User::count() === 0;

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = $isFirstUser ? UserRole::Admin->value : $this->role;

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('homepage', absolute: false), navigate: true);
    }
}
