<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Author Posts')]
class AuthorPosts extends Component
{
    use WithPagination;

    // delete post
    public function delete ($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
    }

    public function render ()
    {
        $posts = Post::with(['author', 'categories', 'tags'])->latest()->paginate(10);
        return view('livewire.author-posts', compact('posts'));
    }
}
