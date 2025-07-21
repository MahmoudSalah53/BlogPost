<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\WithPagination;

class Followers extends Page
{
    use WithPagination;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $title = 'My Followers';
    protected static string $view = 'filament.author.pages.followers';
    protected ?string $subheading = 'Here you can see who is following you';
    protected static ?int $navigationSort = 2;

    public $perPage = 12;

    public function getFollowersProperty()
    {
        return Auth::user()
            ->followers()
            ->paginate($this->perPage);
    }

    public function getTitle(): string
    {
        return "My Followers ({$this->followers->total()})";
    }

    public function toggleFollow($followerId)
    {
        $follower = User::find($followerId);
        $user = Auth::user();

        if ($user->isFollowing($follower)) {
            $user->unfollow($follower);
        } else {
            $user->follow($follower);
        }
    }
}
