<?php

namespace App\Filament\Resources\DiligenciamientoResource\Pages;

use App\Filament\Resources\DiligenciamientoResource;
use App\Imports\DiligenciamientoImport;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiligenciamientos extends ListRecords
{
    protected static string $resource = DiligenciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            \EightyNine\ExcelImport\ExcelImportAction::make()
                ->label('Importar')
                ->color("primary")
                ->modalHeading('Importar Diligenciamientos')
                ->modalDescription('Subir archivo excel para registrar diligenciamientos')
                ->use(DiligenciamientoImport::class)
                ->modalSubmitActionLabel('Importar')
                ->modalWidth('md')
                ->color('success')
                ->icon('heroicon-m-arrow-down-on-square'),
            Actions\CreateAction::make(),
        ];
    }
}
