<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{

    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $posts = Post::where('status', 'published')->orderBy('updated_at', 'desc')->paginate(5);

        return view('livewire.posts-list', compact('posts'));
    }
}
