<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class SavePostComponent extends Component
{

    public bool $isSaved;
    public Post $post;

    public function mount ()
    {
        $this->isSaved = auth()->check() && auth()->user()->savedPosts()->where('post_id', $this->post->id)->exists();
    }

    public function save ()
    {
        if (!auth()->check()) {
            return $this->redirect(route('login'), true);
        }
        $user = auth()->user();
        if($this->isSaved) {
            $user->savedPosts()->detach($this->post->id);
            $this->isSaved = false;
        }else {
            $user->savedPosts()->attach($this->post->id);
            $this->isSaved = true;
        }
    }

    public function render()
    {
        return view('livewire.save-post-component');
    }
}
