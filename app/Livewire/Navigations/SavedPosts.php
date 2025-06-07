<?php

namespace App\Livewire\Navigations;

use Livewire\Component;

class SavedPosts extends Component
{
    public function render ()
    {
        $userSavedPosts = auth()->user()->savedPosts();
        return view('livewire.saved-posts', ['savedPosts' => $userSavedPosts]);
    }
}
