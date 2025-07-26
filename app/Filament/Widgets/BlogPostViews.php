<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use CyrildeWit\EloquentViewable\View;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BlogPostViews extends ApexChartWidget
{
    protected static ?string $pollingInterval = null;
    protected static ?int $sort = 2;
    protected static bool $isLazy = false;

    protected static ?string $chartId = 'blogPostViews';
    protected static ?string $heading = 'Blog Post Views';

    protected function getOptions(): array
    {
        $viewsData = [];
        $daysLabels = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $dayStart = (clone $date)->startOfDay();
            $dayEnd = (clone $date)->endOfDay();

            $viewsCount = View::where('viewable_type', Post::class)
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
            'colors' => ['#2563EB'],
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
