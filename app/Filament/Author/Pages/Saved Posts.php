<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;

class Saved Posts extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.author.pages.saved-posts';
}
