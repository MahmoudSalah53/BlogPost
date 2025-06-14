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
    public $loading = false;

    public function loadMore()
    {
        $this->loading = true;
        $this->perPage += 5;
    }

    public function toggleLike($postId)
    {
        if (!Auth::check())
        {
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

    public function render()
    {
        $posts = Post::withCount('likedByUsers') // لحساب عدد اللايكات تلقائياً
            ->with(['likedByUsers' => function ($q) {
                $q->where('user_id', Auth::id());
            }])
            ->where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->paginate($this->perPage);

        return view('livewire.posts-list', compact('posts'));
    }
}
