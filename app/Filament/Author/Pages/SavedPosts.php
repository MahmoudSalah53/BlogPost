<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class SavedPosts extends Page
{
    use WithPagination;

    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $title = 'Saved Posts';
    protected static string $view = 'filament.author.pages.saved-posts';
    protected ?string $subheading = 'Posts you have saved';
    protected static ?int $navigationSort = 5;

    public $perPage = 9;

    public function getSavedPostsProperty()
    {
        return Auth::user()
            ->savedPosts()
            ->with(['author', 'categories'])
            ->paginate($this->perPage);
    }

    public function getTitle(): string
    {
        return "Saved Posts ({$this->savedPosts->total()})";
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