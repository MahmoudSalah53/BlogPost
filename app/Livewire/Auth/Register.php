<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    #[Validate('required|string|max:255', message: 'Name is required')]
    public string $name = '';

    #[Validate('required|string|lowercase|email|max:255|unique:users,email', message: 'Please enter a valid email address')]
    public string $email = '';

    #[Validate('required|string|confirmed|min:8', message: 'Password must be at least 8 characters')]
    public string $password = '';

    public string $role = 'reader';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validator = Validator::make([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ], [
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This email is already registered',
            'password.required' => 'Password is required',
            'password.confirmed' => 'Password confirmation does not match',
            'password.min' => 'Password must be at least 8 characters',
        ]);

        $validator->stopOnFirstFailure(true);

        if ($validator->fails()) {
            $this->resetValidation();
            $this->setErrorBag($validator->errors());
            return;
        }

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        event(new Registered($user));
        Auth::login($user);
        $this->redirect(route('home', absolute: false), navigate: true);
    }
}