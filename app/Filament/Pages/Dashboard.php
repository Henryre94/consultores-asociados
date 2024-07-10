<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    public $logo = "images/icon.png";

    public $map = "images/map.png";


    public function getTitle(): string | Htmlable
{
    return __('');
}

}
