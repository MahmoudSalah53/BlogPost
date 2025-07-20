<?php

namespace App\Filament\Author\Resources;

use App\Models\Tag;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Author\Resources\PostResource\Pages;
use Filament\Tables\Actions\ActionGroup;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

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
                                    ->live(true)
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        $slug = self::generateUniqueSlug($state, Post::class);
                                        $set('slug', $slug);
                                    })
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(Post::class, 'slug')
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
                                    ])
                                    ->hidden(function (string $operation, ?Model $record) {
                                        return $operation == 'edit' && $record?->status != 'draft';
                                    }),
                                Section::make('Featured Image')
                                    ->schema([
                                        Forms\Components\FileUpload::make('featured_image')
                                            ->label('')
                                            ->image()
                                            ->imageEditor(),
                                    ]),
                                Section::make('Category')
                                    ->schema([
                                        Forms\Components\Select::make('categories')
                                            ->label('')
                                            ->relationship('categories', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->required()
                                                    ->string()
                                                    ->live(true)
                                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                                        $slug = self::generateUniqueSlug($state, Category::class);
                                                        $set('slug', $slug);
                                                    })
                                                    ->maxLength(255),
                                                Forms\Components\TextInput::make('slug')
                                                    ->required()
                                                    ->unique(Category::class, 'slug')
                                                    ->maxLength(255),
                                            ]),
                                    ])
                                    ->collapsed(),
                                Section::make('Tag')
                                    ->schema([
                                        Forms\Components\Select::make('tags')
                                            ->label('')
                                            ->relationship('tags', 'name')
                                            ->multiple()
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('name')
                                                    ->required()
                                                    ->string()
                                                    ->live(true)
                                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                                        $slug = self::generateUniqueSlug($state, Tag::class);
                                                        $set('slug', $slug);
                                                    })
                                                    ->maxLength(255),
                                                Forms\Components\TextInput::make('slug')
                                                    ->required()
                                                    ->unique(Tag::class, 'slug')
                                                    ->maxLength(255),
                                            ]),
                                    ])
                                    ->collapsed(),
                            ])->columnSpan(2),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn(Builder $query) => $query->where('author_id', Auth::id()))
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit(20),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(
                        fn($state) => match (trim($state)) {
                            'published' => 'success',
                            'pending' => 'gray',
                            'draft' => 'warning',
                            'rejected' => 'danger',
                            'reviewing' => 'info',
                            default => 'primary',
                        }
                    ),
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
                SelectFilter::make('status')
                    ->options([
                        'published' => 'published',
                        'draft' => 'draft',
                        'rejected' => 'rejected',
                        'pending' => 'pending',
                        'reviewing' => 'reviewing',
                    ])
                    ->native(false)
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make()
                    ->color('primary'),
                    Tables\Actions\DeleteAction::make(),
                ])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    protected static function generateUniqueSlug($title, $model): string
    {
        $slug = Str::slug($title);
        $counter = 1;
        while ($model::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $counter;
            $counter++;
        }
        return $slug;
    }
}
