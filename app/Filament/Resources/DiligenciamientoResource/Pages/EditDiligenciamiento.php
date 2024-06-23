<?php

namespace App\Filament\Resources\DiligenciamientoResource\Pages;

use App\Filament\Resources\DiligenciamientoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiligenciamiento extends EditRecord
{
    protected static string $resource = DiligenciamientoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
