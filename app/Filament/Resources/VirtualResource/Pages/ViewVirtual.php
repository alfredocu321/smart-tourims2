<?php

namespace App\Filament\Resources\VirtualResource\Pages;

use App\Filament\Resources\VirtualResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewVirtual extends ViewRecord
{
    protected static string $resource = VirtualResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
