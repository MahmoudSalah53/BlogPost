<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;

class BlogRevenue extends ApexChartWidget
{
    protected static ?string $pollingInterval = null;
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;

    protected static ?string $chartId = 'blogRevenue';
    protected static ?string $heading = 'Blog Revenue';

    protected function getOptions(): array
    {
        return [
            'chart' => [
                'type' => 'line',
                'height' => 350,
                'toolbar' => [
                    'show' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Revenue',
                    'data' => [2, 4, 6, 10, 14, 7, 2, 9, 10, 15, 13, 18],
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
            'colors' => ['#10B981'],
            'stroke' => [
                'curve' => 'smooth',
                'width' => 3,
            ],
            'markers' => [
                'size' => 0,
                'hover' => [
                    'size' => 6,
                ]
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'tooltip' => [
                'enabled' => true,
            ],
            'legend' => [
                'show' => false,
            ],
        ];
    }
}
