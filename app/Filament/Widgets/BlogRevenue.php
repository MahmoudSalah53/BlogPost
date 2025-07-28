<?php

namespace App\Filament\Widgets;

use App\Models\Subscription;
use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BlogRevenue extends ApexChartWidget
{
    protected static ?string $pollingInterval = '30s';
    protected static ?int $sort = 3;
    protected static bool $isLazy = false;

    protected static ?string $chartId = 'blogRevenue';
    protected static ?string $heading = 'Subscription Revenue';

    protected function getOptions(): array
    {
        $realData = $this->getRealSubscriptionData();
        
        if ($realData['hasData']) {
            $months = $realData['months'];
            $activeRevenue = $realData['activeRevenue'];
            $expiredRevenue = $realData['expiredRevenue'];
        } else {
            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            $activeRevenue = [120, 250, 380, 420, 510, 380, 290, 450, 520, 680, 590, 750];
            $expiredRevenue = [80, 150, 200, 180, 220, 160, 140, 190, 230, 280, 250, 320];
        }

        return [
            'chart' => [
                'type' => 'area',
                'height' => 300,
                'toolbar' => [
                    'show' => false,
                ],
                'zoom' => [
                    'enabled' => false,
                ],
            ],
            'series' => [
                [
                    'name' => 'Active Subscriptions',
                    'data' => $activeRevenue,
                ],
                [
                    'name' => 'Expired Subscriptions',
                    'data' => $expiredRevenue,
                ],
            ],
            'xaxis' => [
                'categories' => $months,
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                        'fontSize' => '12px',
                        'colors' => '#9CA3AF',
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
                        'colors' => '#9CA3AF',
                    ],
                ],
                'min' => 0,
            ],
            'grid' => [
                'show' => true,
                'borderColor' => '#374151',
                'strokeDashArray' => 1,
            ],
            'colors' => ['#10B981', '#EF4444'],
            'stroke' => [
                'curve' => 'smooth',
                'width' => 2,
            ],
            'fill' => [
                'type' => 'gradient',
                'gradient' => [
                    'opacityFrom' => 0.4,
                    'opacityTo' => 0.1,
                ],
            ],
            'markers' => [
                'size' => 0,
                'hover' => [
                    'size' => 6,
                ],
            ],
            'dataLabels' => [
                'enabled' => false,
            ],
            'tooltip' => [
                'enabled' => true,
                'shared' => true,
                'intersect' => false,
                'theme' => 'dark',
                'y' => [
                    'formatter' => 'function (value) {
                        return "$" + value.toFixed(2);
                    }',
                ],
            ],
            'legend' => [
                'show' => true,
                'position' => 'top',
                'horizontalAlign' => 'left',
                'fontSize' => '12px',
                'fontFamily' => 'inherit',
                'labels' => [
                    'colors' => '#9CA3AF',
                ],
            ],
        ];
    }

    private function getRealSubscriptionData(): array
    {
        try {
            if (!DB::getSchemaBuilder()->hasTable('subscriptions')) {
                return ['hasData' => false];
            }

            $totalSubscriptions = Subscription::count();
            
            if ($totalSubscriptions === 0) {
                return ['hasData' => false];
            }

            $months = collect();
            $activeRevenue = collect();
            $expiredRevenue = collect();
            
            for ($i = 11; $i >= 0; $i--) {
                $date = now()->subMonths($i);
                $monthName = $date->format('M');
                $months->push($monthName);
                
                $activeAmount = Subscription::where('status', 'active')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('amount') ?? 0;
                
                $expiredAmount = Subscription::where('status', 'expired')
                    ->whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->sum('amount') ?? 0;
                    
                $activeRevenue->push(floatval($activeAmount));
                $expiredRevenue->push(floatval($expiredAmount));
            }

            return [
                'hasData' => true,
                'months' => $months->toArray(),
                'activeRevenue' => $activeRevenue->toArray(),
                'expiredRevenue' => $expiredRevenue->toArray(),
            ];

        } catch (\Exception $e) {
            return ['hasData' => false];
        }
    }

    protected function getFilters(): ?array
    {
        return [
            'year' => 'This Year',
            'demo' => 'Demo Data',
        ];
    }

    public function getFilteredTableQuery(?string $filter = null)
    {
        // تطبيق الفلتر حسب الاختيار
        if ($filter === 'demo') {
            return $this->getDemoData();
        }
        
        return $this->getRealSubscriptionData();
    }

    private function getDemoData(): array
    {
        return [
            'hasData' => false, // سيجبر استخدام البيانات الوهمية
        ];
    }
}