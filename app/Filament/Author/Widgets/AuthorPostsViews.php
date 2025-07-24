<?php

namespace App\Filament\Author\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class AuthorPostsViews extends ApexChartWidget
{
    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'authorPostsViews';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'Views';

    protected static ?string $loadingIndicator = 'Loading...';

    protected static ?int $sort = 2;

    protected static bool $isLazy = false;

    protected static ?string $pollingInterval = null;

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
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
            'series' => [
                [
                    'name' => 'Views',
                    'data' => [7, 4, 6, 10, 14, 7, 5, 9, 10, 15, 13, 18],
                ],
            ],
            'plotOptions' => [
                'bar' => [
                    'borderRadius' => 4,
                    'columnWidth' => '60%',
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'stroke' => [
                'show' => true,
                'width' => 0,
                'colors' => ['transparent'],
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                'axisBorder' => [
                    'show' => false,
                ],
                'axisTicks' => [
                    'show' => false,
                ],
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'colors' => '#f59e0b',
                    ],
                ],
                'tooltip' => [
                    'enabled' => true,
                ],
            ],
            'yaxis' => [
                'show' => true,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'colors' => '#6b7280',
                    ],

                ],
            ],
            'fill' => [
                'opacity' => 1,
                'type' => 'solid',
            ],
            'colors' => ['#f59e0b'],
            'grid' => [
                'show' => false,
            ],
            'tooltip' => [
                'enabled' => true,
                'shared' => true,
                'intersect' => false,
                'style' => [
                    'fontFamily' => 'inherit',
                ],

            ],
        ];
    }
}
