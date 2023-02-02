<?php

namespace App\Filament\Widgets;

use App\Models\Cliente;
use App\Models\Venta;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ClienteCounterWidget extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Cliente',Cliente::count()),
            Card::make('ventas',Venta::count()),

        ];
    }
}
