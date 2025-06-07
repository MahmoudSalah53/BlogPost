<?php

namespace App\Livewire\Navigations;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Saved Posts')]
class SavedPosts extends Component
{
    public function render ()
    {
        $userSavedPosts = auth()->user()->savedPosts()->latest()->get();
        return view('livewire.navigations.saved-posts', ['savedPosts' => $userSavedPosts]);
    }
}
