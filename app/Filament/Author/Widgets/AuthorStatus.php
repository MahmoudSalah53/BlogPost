<?php

namespace App\Filament\Author\Widgets;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use CyrildeWit\EloquentViewable\View;
use Filament\Widgets\StatsOverviewWidget\Stat;
use CyrildeWit\EloquentViewable\Support\Period;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class AuthorStatus extends BaseWidget
{

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = false;

    protected function getStats(): array
    {

        $currentAuthor = Auth::user();

        $authorPostIds = Post::where('author_id', $currentAuthor->id)->pluck('id')->toArray();

        $totalViews = View::where('viewable_type', Post::class)
            ->whereIn('viewable_id', $authorPostIds)
            ->count();

        $uniqueViews = View::where('viewable_type', Post::class)
            ->whereIn('viewable_id', $authorPostIds)
            ->distinct('visitor')
            ->count();

        $currentMonthViews = View::where('viewable_type', Post::class)
            ->whereIn('viewable_id', $authorPostIds)
            ->whereBetween('viewed_at', [now()->startOfMonth(), now()])
            ->count();

        $previousMonthViews = View::where('viewable_type', Post::class)
            ->whereIn('viewable_id', $authorPostIds)
            ->whereBetween('viewed_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->count();

        $totalFollowers = $currentAuthor->followers()->count();

        $viewsIncrease = $currentMonthViews - $previousMonthViews;
        $viewsPercentage = $previousMonthViews > 0 ? round((($viewsIncrease / $previousMonthViews) * 100), 1) : 0;

        $publishedPosts = Post::where('author_id', $currentAuthor->id)
            ->where('status', 'published')
            ->whereBetween('created_at', [now()->startOfMonth(), now()])
            ->count();

        $previousPublishedPosts = Post::where('author_id', $currentAuthor->id)
            ->where('status', 'published')
            ->whereBetween('created_at', [now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth()])
            ->count();

        $postsIncrease = $publishedPosts - $previousPublishedPosts;
        $postsPercentage = $previousPublishedPosts > 0 ? round((($postsIncrease / $previousPublishedPosts) * 100), 1) : 0;

        return [
            Stat::make('Unique Views', number_format($uniqueViews))
                ->description(abs($viewsPercentage) . '% ' . ($viewsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($viewsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsIncrease >= 0 ? 'success' : 'danger'),

            Stat::make('All Views', number_format($totalViews))
                ->description(abs($viewsPercentage) . '% ' . ($viewsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($viewsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($viewsIncrease >= 0 ? 'success' : 'danger'),

            Stat::make('Followers Count', number_format($totalFollowers)),

            Stat::make('Published Posts', number_format($publishedPosts))
                ->description(abs($postsPercentage) . '% ' . ($postsIncrease >= 0 ? 'increase' : 'decrease'))
                ->descriptionIcon($postsIncrease >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down')
                ->color($postsIncrease >= 0 ? 'success' : 'danger')
        ];
    }
}
