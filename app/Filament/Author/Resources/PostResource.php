<?php

namespace App\Filament\Author\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use App\Filament\Author\Resources\PostResource\Pages;
use App\Filament\Author\Resources\PostResource\RelationManagers;
use Filament\Forms\Set;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(6)
                    ->schema([
                        Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('content')
                                    ->required(),
                            ])->columnSpan(4),
                        Section::make()
                            ->schema([
                                Section::make('Status')
                                    ->schema([
                                        Forms\Components\Toggle::make('status')
                                            ->label('Send For Review')
                                            ->required(),
                                    ]),
                                Section::make('Featured Image')
                                    ->schema([
                                        Forms\Components\FileUpload::make('featured_image')
                                            ->label('')
                                            ->image(),
                                    ]),
                                Section::make('Category')
                                    ->schema([
                                        Forms\Components\Select::make('category')
                                            ->label('')
                                            ->relationship('categories', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),
                                    ])
                                    ->collapsed(),
                                Section::make('Tag')
                                    ->schema([
                                        Forms\Components\Select::make('Tag')
                                            ->label('')
                                            ->relationship('tags', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload(),
                                    ])
                                    ->collapsed(),
                            ])->columnSpan(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected function mutateFormDataBeforeCreate (array $data)
    {
         $data['status'] = $data['status'] ?  'reviewing' : 'draft';
         return $data;
    }

    protected function mutateFormDataBeforeUpdate (array $data)
    {
        $data['author_id'] = Auth::id();
         $data['status'] = $data['status'] ?  'reviewing' : 'draft';
         return $data;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
