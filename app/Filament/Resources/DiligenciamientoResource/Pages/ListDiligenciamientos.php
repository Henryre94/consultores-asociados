<?php

namespace App\Filament\Resources\DiligenciamientoResource\Pages;

use App\Filament\Resources\DiligenciamientoResource;
use App\Imports\DiligenciamientoImport;
use App\Imports\DiligenciamientosImport;
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
                ->modalDescription('Sube un archivo Excel para registrar diligenciamientos. Ten en cuenta que la carga masiva de información puede tomar un tiempo, por lo que te recomendamos tener paciencia durante el proceso.')
                ->use(DiligenciamientosImport::class)
                ->modalSubmitActionLabel('Importar')
                ->modalWidth('md')
                ->color('success')
                ->icon('heroicon-m-arrow-down-on-square'),
            Actions\CreateAction::make(),
        ];
    }
}
