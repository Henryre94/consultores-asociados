<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use App\Models\Configuration;
use App\Models\Diligenciamiento;

class Bienvenida extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.pages.dashboard';

    public $consultoresLogo = "storage/images/consultores_icon.jpg";

    public $mapPath = "storage/images/departamento_map.jpg";

    public $alcaldiaPath = "storage/images/alcaldia_icon.jpg";

    public $mapExist;

    public $configurations;

    public $alcaldiaLogoExist;


    public $logos;


    public function getTitle(): string|Htmlable
    {
        return __('');
    }

    public static function shouldRegisterNavigation(): bool
    {
        $configurations = Configuration::get();

        return $configurations->count()>0;
    }



    public function mount()
    {

        $this->configurations = Configuration::get();

    

        $mapPath = "storage/images/departamento_map.jpg";
        $alcaldiaPath = "storage/images/alcaldia_icon.jpg";

        if (file_exists(public_path($mapPath)) === true) {
            $this->mapExist = true;
        } else {
            $this->mapExist = false;
        }

        if (file_exists(public_path($alcaldiaPath)) === true) {
            $this->alcaldiaLogoExist = true;
        } else {
            $this->alcaldiaLogoExist = false;
        }



    }




}
