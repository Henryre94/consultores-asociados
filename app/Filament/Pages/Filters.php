<?php

namespace App\Filament\Pages;
use App\Models\Diligenciamiento;

use Filament\Pages\Page;

class Filters extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.filters';

    public $filterValues = [];

    public $inputValue = '';

    public $variable;

    public $diligenciamientos;

    public $choosedFilter = false;

    public $selectedOption = '';

    public $selectedValue;

    public function mount(){

    $this->diligenciamientos = Diligenciamiento::get();

    }

    public function choosedFilterFunction()
    {
        $this->choosedFilter = true;
    }

    public function resetFilter()
    {
        $this->choosedFilter = false; 
        $this->inputValue = '';  // Clear the input field after saving the value
    }

    public function setFilter()
    {
        $this->filterValues[] = $this->inputValue;
    }




}
