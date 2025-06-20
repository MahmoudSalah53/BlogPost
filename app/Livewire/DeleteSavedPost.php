<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class DeleteSavedPost extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    
    public $postId;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function removeSavedPost()
    {
        auth()->user()->savedPosts()->detach($this->postId);
    }

    public function render()
    {
        return view('livewire.delete-saved-post');
    }
}
