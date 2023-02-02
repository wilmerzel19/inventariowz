<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ScatterChartWidget;

class ClienteChart extends ScatterChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            'datasets' => [
                [
                    'label' => 'Blog Posts',
                    'data' => [10, 20, 30, 40, 50, 60, 70],
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'borderWidth' => 1,
                ],
            ],
        ];
    }
}
