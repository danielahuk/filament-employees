<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Country;
use App\Models\Employee;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $id = Country::where('country_code', 'ID')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make($us->name. ' Employees', $us->employees_count),
            Card::make($id->name. ' Employees', $id->employees_count),
        ];
    }
}
