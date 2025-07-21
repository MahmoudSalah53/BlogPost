<?php

namespace App\Filament\Author\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class Followers extends Page implements HasTable
{
    use InteractsWithTable;

    public $followers;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $title = 'My Followers';

    protected static string $view = 'filament.author.pages.followers';

    protected ?string $subheading = 'Here you can see who is following you';

    protected static ?int $navigationSort = 2;

    public function mount()
    {
        $this->followers = Auth::user()->followers()->get();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query($this->getFollowersQuery())
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Avatar')
                    ->circular()
                    ->getStateUsing(function ($record) {
                        return $record->avatar
                            ? asset('storage/' . $record->avatar)
                            : null;
                    })
                    ->default(function ($record) {
                        return 'https://ui-avatars.com/api/?name=' . urlencode($record->name) . '&background=random&length=2';
                    })
                    ->height(40)
                    ->width(40),

                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->formatStateUsing(function ($record) {
                        return $record->role === 'author' ? $record->name : $record->name;
                    }),

                Tables\Columns\BadgeColumn::make('role')
                    ->label('Type')
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    })
                    ->colors([
                        'warning' => 'admin',
                        'primary' => 'author',
                        'gray' => 'reader',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('follow_back')
                    ->label('Follow Back')
                    ->icon('heroicon-m-user-plus')
                    ->color('success')
                    ->size('sm')
                    ->visible(function ($record) {
                        return $record->role === 'author' && !Auth::user()->isFollowing($record);
                    })
                    ->action(function ($record) {
                        Auth::user()->follow($record);
                        $this->notify('success', 'You are now following ' . $record->name);
                    }),

                Tables\Actions\Action::make('unfollow')
                    ->label('Unfollow')
                    ->icon('heroicon-m-user-minus')
                    ->color('danger')
                    ->size('sm')
                    ->visible(function ($record) {
                        return $record->role === 'author' && Auth::user()->isFollowing($record);
                    })
                    ->requiresConfirmation()
                    ->modalHeading('Unfollow User')
                    ->modalDescription(fn($record) => 'Are you sure you want to unfollow ' . $record->name . '?')
                    ->modalSubmitActionLabel('Yes, Unfollow')
                    ->action(function ($record) {
                        Auth::user()->unfollow($record);
                        $this->notify('success', 'You unfollowed ' . $record->name);
                    }),

            ])
            ->emptyStateHeading('No followers yet')
            ->emptyStateDescription('Share your content to gain followers!')
            ->emptyStateIcon('heroicon-o-users');
    }

    protected function getFollowersQuery(): Builder
    {
        return Auth::user()
            ->followers()
            ->getQuery();
    }

    public function getTitle(): string
    {
        $count = $this->getFollowersQuery()->count();
        return "My Followers ({$count})";
    }
}