<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use App\Models\Post;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\PostResource\Pages;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Validation\Rule;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    const STATUS_OPTIONS = [
        'published' => 'published',
        'draft' => 'draft',
        'rejected' => 'rejected',
        'pending' => 'pending',
        'reviewing' => 'reviewing',
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(6)
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('author_id')
                                    ->relationship('author', 'name')
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->string()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('email')
                                            ->required()
                                            ->email()
                                            ->unique(User::class, 'email'),
                                        Forms\Components\TextInput::make('password')
                                            ->required()
                                            ->password()
                                            ->minLength(8),
                                        Forms\Components\Hidden::make('role')
                                            ->default('author')
                                    ]),
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
                                    ->unique(Post::class, 'slug', ignoreRecord: true)
                                    ->maxLength(255),
                                Forms\Components\RichEditor::make('content')
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columnSpan(4),
                        Forms\Components\Section::make('')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->imageEditor(),
                                Forms\Components\Select::make('status')
                                    ->options(self::STATUS_OPTIONS)
                                    ->native(false)
                                    ->required()
                                    ->rule([
                                        Rule::in(self::STATUS_OPTIONS),
                                    ]),
                                Section::make('Categories')
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
                                Section::make('Tags')
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
                                                    ->maxLength(255)
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
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image'),
                Tables\Columns\TextColumn::make('author.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->limit(20),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(
                        fn($state) => match ($state) {
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
                    ->options(self::STATUS_OPTIONS)
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
                    Tables\Actions\BulkAction::make('Update Status')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->required()
                                ->options(self::STATUS_OPTIONS)
                                ->native(false),
                        ])
                        ->action(function (Collection $records, array $data) {
                            foreach ($records as $record) {
                                $record->update(['status' => $data['status']]);
                            }
                        })
                        ->icon('heroicon-o-pencil-square')
                        ->color('primary'),
                ])
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
