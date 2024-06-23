<?php

namespace App\Filament\Resources\DiligenciamientoResource\Pages;

use App\Filament\Resources\DiligenciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiligenciamientos extends ListRecords
{
    protected static string $resource = DiligenciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
