<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Followers extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.author.pages.followers';

    protected ?string $subheading = 'Here you can see who is following you';

    protected static ?int $navigationSort = 2;

    public function getFollowersProperty()
    {
        return Auth::user()->followers()->get();
    }
}
