<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class LikedPosts extends Page
{
    use WithPagination;

    protected static ?string $navigationIcon = 'heroicon-o-heart';
    protected static ?string $title = 'Liked Posts';
    protected static string $view = 'filament.author.pages.liked-posts';
    protected ?string $subheading = 'Posts you have liked';
    protected static ?int $navigationSort = 4;

    public $perPage = 9;

    public function getLikedPostsProperty()
    {
        return Auth::user()
            ->likedPosts()
            ->with(['author', 'categories'])
            ->paginate($this->perPage);
    }

    public function getTitle(): string
    {
        return "Liked Posts ({$this->likedPosts->total()})";
    }

    public function toggleLike($postId)
    {
        $post = \App\Models\Post::find($postId);
        $user = Auth::user();

        if ($user->likedPosts()->where('post_id', $postId)->exists()) {
            $user->likedPosts()->detach($postId);
        } else {
            $user->likedPosts()->attach($postId);
        }
    }

    public function toggleSave($postId)
    {
        $post = \App\Models\Post::find($postId);
        $user = Auth::user();

        if ($user->savedPosts()->where('post_id', $postId)->exists()) {
            $user->savedPosts()->detach($postId);
        } else {
            $user->savedPosts()->attach($postId);
        }
    }
}