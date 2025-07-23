<?php

namespace App\Filament\Author\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class LatestFollowersList extends Widget
{
    protected static string $view = 'filament.author.widgets.latest-followers-list';
    
    protected static ?int $sort = 4;

    public $latestFollowers;

    public function mount()
    {
        $this->latestFollowers = $this->getAuthorLatestFollowers();
    }

    public function getAuthorLatestFollowers()
    {
        return Auth::user()->followers()->latest()->take(6)->get();
    }
}
