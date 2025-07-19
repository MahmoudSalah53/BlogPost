<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\EditRecord;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
            ->hidden(fn(Model $record) => $record->id == Auth::id()),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if (empty($data['password'])) unset($data['password']);
        return $data;
    }
}
