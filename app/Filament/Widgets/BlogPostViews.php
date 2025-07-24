<?php

namespace App\Filament\Widgets;

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
                    'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 2],
                ],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'fontSize' => '12px',
                        'colors' => '#6B7280',
                    ],
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
