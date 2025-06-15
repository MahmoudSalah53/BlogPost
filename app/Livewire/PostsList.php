<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class PostsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';
    public $perPage = 5;
    public $perComment = 5;
    public $commentsPerPageDefault = 5;
    public $commentsPerPage = [];
    public $newCommentContent = [];
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

    public function loadMoreComments($postId)
    {
        $this->commentsPerPage[$postId] += 5;
    }


    public function toggleLike($postId)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $post = Post::findOrFail($postId);
        $user = Auth::user();

        if ($post->likedByUsers()->where('user_id', $user->id)->exists()) {
            $user->likedPosts()->detach($post->id);
        } else {
            $user->likedPosts()->attach($post->id);
        }
    }

    public function toggleSave($postId)
    {
        if (!Auth::check()) {
            return redirect(route('login'));
        }

        $post = Post::findOrFail($postId);
        $user = Auth::user();

        if ($post->savedByUsers()->where('user_id', $user->id)->exists()) {
            $user->savedPosts()->detach($post->id);
        } else {
            $user->savedPosts()->attach($post->id);
        }
    }

    public function addComment($postId)
    {
        $this->validate([
            "newCommentContent.$postId" => 'required|string|max:500',
        ]);

        \App\Models\Comment::create([
            'post_id' => $postId,
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'content' => $this->newCommentContent[$postId],
        ]);


        $this->newCommentContent[$postId] = '';

        $this->commentsPerPage[$postId] += 1;
    }


    public function render()
    {
        $posts = Post::withCount(['likedByUsers', 'comments', 'savedByUsers'])
            ->with([
                'likedByUsers' => function ($q) {
                    $q->where('user_id', Auth::id());
                },
                'savedByUsers' => function ($q) {
                    $q->where('user_id', Auth::id());
                },
                'comments'
            ])
            ->where(function($quere)
            {
                $quere->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('content', 'like', '%' . $this->search . '%');
            })
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        foreach ($posts as $post) {
            if (!isset($this->commentsPerPage[$post->id])) {
                $this->commentsPerPage[$post->id] = $this->commentsPerPageDefault;
            }
        }

        return view('livewire.posts-list', compact('posts'));
    }
}
