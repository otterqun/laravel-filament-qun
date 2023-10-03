<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Employee;
use App\Models\Country;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {

        $mas = Country::where('country_code','MAS')->withCount('employees')->first();
        $ind = Country::where('country_code','IND')->withCount('employees')->first();
        return [
            Stat::make('All Employee', Employee::all()->count()),
            Stat::make($mas->name.' Employees',$mas->employees_count),
            Stat::make($ind->name.' Employees',$ind->employees_count),
        ];
    }
}
