<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Configuration;

class Configuracion extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.Configuracion';

    public $configurations;
    public $departamento = '';
    public $municipio = '';
    public $activateAlcaldiaLogo = false;
    public $activateDepartamentoLogo = false;
    public $isEntriesComplete;
    public $alert = false;

    protected $rules = [
        'departamento' => 'required|string|max:255',
        'municipio' => 'required|string|max:255',
        'activateAlcaldiaLogo' => 'boolean',
        'activateDepartamentoLogo' => 'boolean',
    ];

    public function getTitle(): string|Htmlable
    {
        return __('Configuracion de la aplicacion');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Superadmin');
    }

    public function mount(): void
    {

        $this->configurations = Configuration::query()->get();
    }


    public function saveConfiguration()
    {
        $isComplete = $this->departamento !== null && $this->municipio !== null;


        if ($this->departamento === '' || $this->municipio === '') {
            $this->alert = true;
        } else {
            // Save to database
            // Assuming you have a Configuration model and table
            \App\Models\Configuration::create([
                'departamento' => $this->departamento,
                'alcaldia' => $this->municipio,
                'alcaldia_logo_active' => $this->activateAlcaldiaLogo,
                'departamento_logo_active' => $this->activateDepartamentoLogo,
                'status_complete' => $isComplete,
            ]);

            redirect()->route('filament.admin.pages.configuracion');
        }



        if ($isComplete === true) {
            $this->configurations = Configuration::query()->get();
        }


    }

    public function resetValues()
    {
        Configuration::query()->delete();
        $this->mount();
        return redirect()->route('filament.admin.pages.configuracion');
    }

    public function closeAlert()
    {
        $this->alert = false;
    }
}
