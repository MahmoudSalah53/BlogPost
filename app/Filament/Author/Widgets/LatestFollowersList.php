<?php

namespace App\Filament\Author\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class LatestFollowersList extends Widget
{
    protected static string $view = 'filament.author.widgets.latest-followers-list';

    protected static ?int $sort = 4;

    protected static bool $isLazy = false;

    protected static ?string $pollingInterval = null;

    public $latestFollowers;

    public function mount()
    {
        $this->latestFollowers = $this->getAuthorLatestFollowers();
    }

    public function getAuthorLatestFollowers()
    {
        return Auth::user()->followers()->latest()->take(6)->get();
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
