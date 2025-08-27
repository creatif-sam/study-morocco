<?php
namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget;
use App\Models\Program;
use App\Models\Institution;
use App\Models\Application;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            StatsOverviewWidget::class,
        ];
    }
}

// Widget for stats overview
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Program;
use App\Models\Institution;
use App\Models\Application;

class StatsOverviewWidget extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Programs', Program::count()),
            Stat::make('Institutions', Institution::count()),
            Stat::make('Applications', Application::count()),
        ];
    }
}
