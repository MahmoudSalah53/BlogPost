<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class SavedPosts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.author.pages.saved-posts';

    protected ?string $subheading = 'Here you can manage saved posts';

    public $savedPosts;

    public function mount()
    {
        $this->savedPosts =$this->getSavedPosts();
    }   

    public function getSavedPosts()
    {
        return Auth::user()->savedPosts()->get();
    }
}
