<?php

namespace App\Livewire\Navigations;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;

#[Layout('components.layouts.app')]
class SavedPosts extends Component
{
    public function render ()
    {
        $userSavedPosts = optional(Auth::user())->savedPosts()?->latest()?->get() ?? collect();
        return view('livewire.navigations.saved-posts', ['savedPosts' => $userSavedPosts]);
    }
}
