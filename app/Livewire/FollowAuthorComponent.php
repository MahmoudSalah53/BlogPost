<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Database\QueryException;

class FollowAuthorComponent extends Component
{
    public $author;
    public bool $isFollowing;
    public $loading = false;

    public function mount(User $author)
    {
        $this->author = $author;
        $this->checkFollowingStatus();
    }

    public function checkFollowingStatus()
    {
        $this->isFollowing = auth()->check() && 
            auth()->user()->followings()->where('followed_id', $this->author->id)->exists();
    }

    public function save()
    {
        if (!auth()->check()) {
            return $this->redirect(route('login'), true);
        }

        if ($this->loading) {
            return;
        }

        $this->loading = true;
        $user = auth()->user();
        try {
            $currentlyFollowing = $user->followings()->where('followed_id', $this->author->id)->exists();

            if ($currentlyFollowing) {
                $user->followings()->detach($this->author->id);
                $this->isFollowing = false;
            } else {
                $alreadyExists = $user->followings()->where('followed_id', $this->author->id)->exists();
                if (!$alreadyExists) {
                    $user->followings()->attach($this->author->id);
                    $this->isFollowing = true;
                } else {
                    $this->isFollowing = true;
                }
            }

            $this->js("
                window.dispatchEvent(new CustomEvent('follow-status-changed', {
                    detail: { 
                        authorId: {$this->author->id}, 
                        isFollowing: " . ($this->isFollowing ? 'true' : 'false') . " 
                    }
                }));
            ");

        } catch (QueryException $e) {
            $this->checkFollowingStatus();
        }
        $this->loading = false;
    }

    public function getListeners()
    {
        return [
            'author-follow-updated' => 'handleFollowUpdate',
            'instant-follow-update' => 'handleInstantUpdate'
        ];
    }

    public function handleFollowUpdate($data)
    {
        if ($data['authorId'] == $this->author->id) {
            $this->isFollowing = $data['isFollowing'];
        }
    }

    public function handleInstantUpdate($data)
    {
        if ($data['authorId'] == $this->author->id) {
            $this->isFollowing = $data['isFollowing'];
        }
    }

    public function render()
    {
        return view('livewire.follow-author-component');
    }
}