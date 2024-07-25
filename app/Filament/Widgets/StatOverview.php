<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Ticket;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatOverview extends BaseWidget
{

    protected static ?int $sort = 2;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->color('success'),
            Stat::make('Total Tickets', Ticket::count()),
            Stat::make('Average time on page', '3:12')
                ->description('3% increase')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Processed', '192.1k')
                ->color('success')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
        ];
    }

}
