<?php

namespace App\Filament\Resources\CompraProductoResource\Pages;

use App\Filament\Resources\CompraProductoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCompraProducto extends EditRecord
{
    protected static string $resource = CompraProductoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
