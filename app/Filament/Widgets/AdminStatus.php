<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\User;
use CyrildeWit\EloquentViewable\View;
use Filament\Widgets\StatsOverviewWidget\Stat;
use CyrildeWit\EloquentViewable\Support\Period;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AdminStatus extends BaseWidget
{

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = false;


    protected function getStats(): array
    {

        $currentMonth = Period::create(now()->startOfMonth(), now());
        $previousMonth = Period::create(now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth());

        $totalViews = views(Post::class)->count();
        $uniqueViews = views(Post::class)->unique()->count();

        $currentMonthViews = views(Post::class)
            ->period($currentMonth)
            ->count();

        $previousMonthViews = views(Post::class)
            ->period($previousMonth)
            ->count();

        $viewsIncrease = $currentMonthViews - $previousMonthViews;
        $viewsPercentage = $previousMonthViews > 0 ? round((($viewsIncrease / $previousMonthViews) * 100), 1) : 0;

        $authorsCount = User::whereBetween('created_at', [now()->startOfMonth(), now()])
            ->where('role', 'author')
            ->count();
        $previousAuthorsCount = User::whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->where('role', 'author')
            ->count();
        $authorsIncrease = $authorsCount - $previousAuthorsCount;
        $authorsPercentage = $previousAuthorsCount > 0 ? round((($authorsIncrease / $previousAuthorsCount) * 100), 1) : 0;

        return [
            Stat::make('Unique Views', number_format($uniqueViews))
                ->description(abs($viewsPercentage) . '% ' . ($viewsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($viewsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsIncrease >= 0 ? 'success' : 'danger'),

            Stat::make('All Views', number_format($totalViews))
                ->description(number_format(abs($viewsIncrease)) . ' ' . ($viewsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($viewsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsIncrease >= 0 ? 'success' : 'danger'),

            Stat::make('Authors Count', number_format($authorsCount))
                ->description(abs($authorsPercentage) . '% ' . ($authorsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($authorsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($authorsIncrease >= 0 ? 'success' : 'danger'),
        ];
    }
}
