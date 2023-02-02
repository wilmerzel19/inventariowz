<?php

namespace App\Filament\Resources\ProductoVentaResource\Pages;

use App\Filament\Resources\ProductoVentaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductoVenta extends EditRecord
{
    protected static string $resource = ProductoVentaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
