<?php

namespace App\Filament\Author\Resources\PostResource\Pages;

use App\Filament\Author\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave (array $data): array
    {
        $data['status'] = $data['status'] ?  'reviewing' : 'draft';
        return $data;
    }

    protected function mutateFormDataBeforeFill (array $data): array
    {
        if($data['status'] == 'draft'){
            $data['status'] = false;
            return $data;
        }
        return $data;
    }
}
