<?php

namespace App\Filament\Pages;
use App\Models\Diligenciamiento;
use App\Models\Logo;
use Barryvdh\DomPDF\Facade\Pdf;

use Filament\Pages\Page;

class Filters extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.filters';

    public $filterValues = [];

    public $selectedColums = [];

    public $inputValue = '';

    public $variable;
    
    public $diligenciamientos;

    public $appGeoValues;

    public $choosedFilter = false;

    public $openModal = false;

    public $noFilterApplied = false;

    public $selectedOption = '';

    public $selectedValue;

    public $filteredOptions = '';

    public function mount(){

        $this->appGeoValues = Logo::query()->get();

   
    }

    public function choosedFilterFunction()
    {
        $this->choosedFilter = true;
        
    }

    public function resetFilter()
    {
        $this->selectedColums[] = $this->selectedOption;
        $this->filterValues[] = $this->inputValue;
        $this->choosedFilter = false; 
        $this->selectedOption = '';
        $this->inputValue = ''; 
    }
    public function resetFilterData()
    {
        $this->selectedColums = [];
        $this->filterValues = [];
        $this->diligenciamientos = null;
        $this->choosedFilter = false; 
        $this->selectedOption = '';
        $this->inputValue = '';

    }

    public function removeFilter($index)
    {
        unset($this->selectedColums[$index]);
        unset($this->filterValues[$index]);

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
                
                $filterValue = $this->filterValues[$index];

                $query->where($selectedColum, '=', $filterValue);
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
