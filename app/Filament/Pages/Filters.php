<?php

namespace App\Filament\Pages;
use App\Models\Diligenciamiento;
use App\Models\Configuration;
use App\Models\Logo;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Htmlable;

use Filament\Pages\Page;

class Filters extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.filters';

    public $filterValues = [];

    public $selectedColums = [];

    public $conditions = [];

    public $inputValue = '';

    public $condition = '';

    public $variable;
    
    public $diligenciamientos;

    public $configurations;

    public $appGeoValues;

    public $choosedFilter = false;

    public $openModal = false;

    public $noFilterApplied = false;

    public $selectedOption = '';

    public $selectedValue;

    public $filteredOptions = '';

    public $showGraphics = false;

    public function getTitle(): string | Htmlable
    {
        return __('Filtros');
    }

    public function mount(){

        $this->configurations = Configuration::query()->get();
    }

    public function choosedFilterFunction()
    {
        $this->choosedFilter = true;
        
    }

    public function resetFilter()
    {
        $this->selectedColums[] = $this->selectedOption;
        $this->filterValues[] = $this->inputValue;
        $this->conditions[] = $this->condition;
        $this->choosedFilter = false; 
        $this->showGraphics = false;
        $this->selectedOption = '';
        $this->inputValue = ''; 
        $this->condition = '';
    }
    public function resetFilterData()
    {
        $this->selectedColums = [];
        $this->filterValues = [];
        $this->conditions = [];
        $this->diligenciamientos = null;
        $this->choosedFilter = false; 
        $this->showGraphics = false;
        $this->selectedOption = '';
        $this->inputValue = '';
        $this->condition = '';

    }

    public function removeFilter($index)
    {
        $this->showGraphics = false;
        unset($this->selectedColums[$index]);
        unset($this->filterValues[$index]);
        unset($this->conditions[$index]);

        // Re-index arrays to prevent gaps in the indices
        $this->selectedColums = array_values($this->selectedColums);
        $this->filterValues = array_values($this->filterValues);
        if($this->selectedColums === [])
        {
            $this->diligenciamientos = null;  
        }else
        {
            $this->getFilteredData();
        }  
    }

    public function generateGraphics() {
        $this->showGraphics = true;
    }

    
    public function getFilteredData()
    {

     $query = Diligenciamiento::query();


    if(count($this->selectedColums) === 0)
    {
        $this->noFilterApplied = true;
        $this->openModal = true;
    }else
    {
        if (count($this->selectedColums) === count($this->filterValues)) {
            
            foreach ($this->selectedColums as $index => $selectedColum) {

                if($selectedColum === 'edad')
                {
                    $filterValue = $this->filterValues[$index];

                    $condition = $this->conditions[$index];
                    
                    $query->where($selectedColum, $condition, $filterValue);
                }else{
                    $filterValue = $this->filterValues[$index];

                    $query->where($selectedColum, '=', $filterValue);
                }        
            }
            $this->diligenciamientos = $query->get();
        }
        
    }

    }

    public function generateModal()
    {
        $this->openModal = true;
    }

    public function closeModal()
    {
        $this->noFilterApplied = false;
        $this->openModal = false;
        
    }


}
