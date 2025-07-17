<?php

namespace App\Filament\Author\Resources\PostResource\Pages;

use App\Filament\Author\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

    protected function mutateFormDataBeforeCreate (array $data): array
    {
        $data['author_id'] = Auth::id();
        $data['status'] = $data['status'] ?  'reviewing' : 'draft';
        return $data;
    }
}
