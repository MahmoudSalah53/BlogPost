<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Logs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Logs';
    protected static ?string $navigationGroup = 'System';
    protected static string $view = 'filament.pages.logs'; // إنشاء أدناه
}