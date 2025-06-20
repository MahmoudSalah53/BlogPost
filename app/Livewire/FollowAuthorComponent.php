<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class FollowAuthorComponent extends Component
{
    public $author;
    public bool $isFollowing;

    public function mount (User $author)
    {
        $this->author = $author;
        $this->isFollowing = auth()->check() && auth()->user()->followings->contains($author->id);
    }

    public function save ()
    {
        if (!auth()->check()){
            return $this->redirect(route('login'), true);
        }

        $user = auth()->user();

        if($this->isFollowing){
            $user->followings()->detach($this->author->id); // Unfollow
            $this->isFollowing = false;
        } else {
            $user->followings()->attach($this->author->id); // follow
            $this->isFollowing = true;
            }
    }

    public function render()
    {
        return view('livewire.follow-author-component');
    }
}
