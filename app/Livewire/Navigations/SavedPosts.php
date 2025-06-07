<?php

namespace App\Livewire\Navigations;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.app')]
class SavedPosts extends Component
{
    public function render ()
    {
        $userSavedPosts = auth()->user()->savedPosts();
        return view('livewire.saved-posts', ['savedPosts' => $userSavedPosts]);
    }
}
