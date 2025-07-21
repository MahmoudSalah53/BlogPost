<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class LikedPosts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.author.pages.liked-posts';

    protected ?string $subheading = 'Here you can see your liked posts';

    public $likedPosts;

    public function mount()
    {
        $this->likedPosts = $this->getUserLikedPosts();
    }

    public function getUserLikedPosts()
    {
        return Auth::user()->likedPosts()->get();
    }
}
