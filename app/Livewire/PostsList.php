<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    public $perPage = 5;
    public $loading = false;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function loadMore()
    {
        $this->loading = true;
        $this->perPage += 5;
    }

    public function render()
    {
        $posts = Post::with('author')->withCount(['likedByUsers', 'comments', 'savedByUsers'])
            ->where(function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->where('status', 1)
            ->latest()
            ->paginate(10);

        return view('livewire.posts-list', compact('posts'));
    }
}
