<?php

namespace App\Filament\Resources\LogoResource\Pages;
use Illuminate\Support\Facades\Storage;

use App\Filament\Resources\LogoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogo extends EditRecord
{
    protected static string $resource = LogoResource::class;

    protected static string $path = "storage/";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->before(function ($record) {
                    if ($record->logo_alcaldia) {
                        Storage::disk('public')->delete($record->logo_alcaldia);
                    }
                    if ($record->logo_departamento) {
                        Storage::disk('public')->delete($record->logo_departamento);
                    }
                }),
        ];
    }
}
