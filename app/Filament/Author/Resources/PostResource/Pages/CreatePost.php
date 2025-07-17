<?php

namespace App\Filament\Author\Resources\PostResource\Pages;

use App\Filament\Author\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;
}
