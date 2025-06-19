<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LikedPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function removeLikedPost($postId)
    {
        auth()->user()->likedPosts()->detach($postId);
    }

    public function render()
    {
        $userLikedPosts = auth()->user()->likedPosts()->latest()
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->orWhereHas('author', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            })
            ->paginate(8);
        return view('livewire.liked-posts', compact('userLikedPosts'));
    }
}
