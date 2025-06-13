<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $perPage = 5;
    public $loading = false;

    public function loadMore()
    {
        $this->loading = true;
        $this->perPage += 5;
    }

    public function render()
    {
        $posts = Post::where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.posts-list', compact('posts'));
    }
}
