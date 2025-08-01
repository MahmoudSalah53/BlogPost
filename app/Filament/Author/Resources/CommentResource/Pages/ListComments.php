<?php

namespace App\Filament\Author\Resources\CommentResource\Pages;

use App\Filament\Author\Resources\CommentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComments extends ListRecords
{
    protected static string $resource = CommentResource::class;
}
