<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AdminStatus extends BaseWidget
{

    protected static ?string $pollingInterval = null;

    protected static ?int $sort = 1;

    protected static bool $isLazy = false;


    protected function getStats(): array
    {
        return [
            Stat::make('Unique Views', '195.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('All Views', '195.1k')
                ->description('32k increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Authors Count', '21%')
                ->description('7% decrease')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Revenue', '43')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
        ];
    }
}
