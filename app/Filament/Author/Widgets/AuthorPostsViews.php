<?php

namespace App\Filament\Author\Widgets;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use CyrildeWit\EloquentViewable\View;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class AuthorPostsViews extends ApexChartWidget
{
    /**
     * Chart Id
     */
    protected static ?string $chartId = 'authorPostsViews';

    /**
     * Widget Title
     */
    protected static ?string $heading = 'Views';

    protected static ?string $loadingIndicator = 'Loading...';
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = null;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     */
    protected function getOptions(): array
    {

        $authorPostIds = Post::where('author_id', Auth::id())->pluck('id');

        $viewsData = [];
        $daysLabels = [];


        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dayStart = $date->copy()->startOfDay();
            $dayEnd = $date->copy()->endOfDay();

            $viewsCount = View::where('viewable_type', Post::class)
                ->whereIn('viewable_id', $authorPostIds)
                ->whereBetween('viewed_at', [$dayStart, $dayEnd])
                ->count();

            $viewsData[] = $viewsCount;
            $daysLabels[] = $date->format('D');
        }

        return [
            'chart' => [
                'type' => 'bar',
                'height' => 350,
                'toolbar' => [
                    'show' => false,
                ],
                'fontFamily' => 'inherit',
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 4,
                    'columnWidth' => '60%',
                ]
            ],
            'series' => [
                [
                    'name' => 'Views',
                    'data' => $viewsData,
                ],
            ],
            'xaxis' => [
                'categories' => $daysLabels,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'fontSize' => '10px',
                        'colors' => '#6B7280',
                    ],
                    'rotate' => 0,
                ],
                'axisBorder' => [
                    'show' => false,
                ],
                'axisTicks' => [
                    'show' => false,
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'fontSize' => '12px',
                        'colors' => '#6B7280',
                    ],
                ],
            ],
            'grid' => [
                'show' => false,
            ],
            'colors' => ['#f59e0b'],
            'dataLabels' => [
                'enabled' => false,
            ],
            'stroke' => [
                'show' => false,
            ],
            'tooltip' => [
                'enabled' => true,
                'y' => [
                    'formatter' => 'function(val) { return val + " views" }',
                ],
            ],
            'legend' => [
                'show' => false,
            ],
            'fill' => [
                'opacity' => 1,
            ]
        ];
    }
}
