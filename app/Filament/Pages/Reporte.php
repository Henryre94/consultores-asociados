<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Configuration;
use App\Models\Diligenciamiento;

class Reporte extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = 6;

    protected static string $view = 'filament.pages.reports';

    public $configurations;

    public $diligenciamientos;

    public $showGraphics = false;

    public $omision;

    public $omisionCabecera;

    public $omisionPoblado;


    public function getTitle(): string|Htmlable
    {
        return __('');
    }

    public function mount(): void
    {
        $this->diligenciamientos = Diligenciamiento::all();

    }

    public static function shouldRegisterNavigation(): bool
    {
        $configurations = Configuration::get();

        return $configurations->count()>0;
    }

    public function generateGraphics()
    {
        $this->showGraphics = true;
    }

    public function generateReport()
    {
        return redirect()->route('generate-report', ['omision' => $this->omision]);
    }

}
