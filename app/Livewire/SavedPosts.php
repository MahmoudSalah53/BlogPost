<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class SavedPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function removeSavedPost($postId)
    {
        auth()->user()->savedPosts()->detach($postId);
    }

    public function render()
    {
        $userSavedPosts = auth()->user()->savedPosts()->latest()
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->orWhereHas('author', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            })
            ->paginate(6);
        return view('livewire.saved-posts', compact('userSavedPosts'));
    }
}
