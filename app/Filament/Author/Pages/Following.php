<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\WithPagination;

class Following extends Page
{
    use WithPagination;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $title = 'Following';
    protected static string $view = 'filament.author.pages.following';
    protected ?string $subheading = 'People you are following';
    protected static ?int $navigationSort = 3;

    public $perPage = 12;

    public function getFollowingProperty()
    {
        return Auth::user()
            ->followings()
            ->paginate($this->perPage);
    }

    public function getTitle(): string
    {
        return "Following ({$this->following->total()})";
    }

    public function toggleFollow($followingId)
    {
        $followingUser = User::find($followingId);
        $user = Auth::user();

        if ($user->isFollowing($followingUser)) {
            $user->unfollow($followingUser);
        } else {
            $user->follow($followingUser);
        }
    }
}