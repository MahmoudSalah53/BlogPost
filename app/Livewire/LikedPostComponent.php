<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikedPostComponent extends Component
{
    public bool $isLiked;
    public Post $post;

    public function mount ()
    {
        $this->isLiked = auth()->check() && auth()->user()->likedPosts()->where('post_id', $this->post->id)->exists();
    }

    public function save ()
    {
        if (!auth()->check()) {
            return $this->redirect(route('login'), true);
        }
        $user = auth()->user();
        if ( $this->isLiked) {
            $user->likedPosts()->detach($this->post->id);
            $this->isLiked = false;
        } else {
            $user->likedPosts()->attach($this->post->id);
            $this->isLiked = true;
        }
    }

    public function render()
    {
        return view('livewire.liked-post-component');
    }
}
