<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowPosts extends Component
{
    public Post $post;
    public $newCommentContent = [];
    public $commentsPerPage = 3;
    public $expandedPosts = [];

    protected $rules = [
        'newCommentContent' => 'required|string|max:500',
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }
    public function loadMoreComments($postId)
    {
        if (!isset($this->expandedPosts[$postId])) {
            $this->expandedPosts[$postId] = $this->commentsPerPage;
        }

        $this->expandedPosts[$postId] += 5; 
    }

    public function addComment($postId)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $this->validate([
            "newCommentContent.$postId" => 'required|string|max:500',
        ]);


        $this->post->comments()->create([
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'content' => $this->newCommentContent[$postId],
        ]);

        $this->newCommentContent[$postId] = '';

        $this->post = $this->post->fresh([
            'comments' => fn($q) => $q->latest(),
            'likedByUsers' => fn($q) => $q->where('user_id', Auth::id()),
            'savedByUsers' => fn($q) => $q->where('user_id', Auth::id()),
        ])->loadCount(['likedByUsers', 'savedByUsers', 'comments']);
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $user = Auth::user();
        $user->likedPosts()->toggle($this->post->id);
        $this->post->loadCount('likedByUsers');
    }

    public function toggleSave()
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $user = Auth::user();
        $user->savedPosts()->toggle($this->post->id);
        $this->post->loadCount('savedByUsers');
    }

    public function render()
    {
        $this->post = $this->post->fresh([
            'comments' => fn($q) => $q->latest(),
            'likedByUsers' => fn($q) => $q->where('user_id', Auth::id()),
            'savedByUsers' => fn($q) => $q->where('user_id', Auth::id()),
        ])->loadCount(['likedByUsers', 'savedByUsers', 'comments']);

        return view('livewire.show-posts');
    }
}