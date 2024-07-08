<?php

namespace App\Filament\Pages;
use App\Models\Diligenciamiento;

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

    public $choosedFilter = false;

    public $selectedOption = '';

    public $selectedValue;

    public $filteredOptions = '';

    public function mount(){

    

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

        if (count($this->selectedColums) === count($this->filterValues)) {
            
            foreach ($this->selectedColums as $index => $selectedColum) {
                
                $filterValue = $this->filterValues[$index];

                $query->where($selectedColum, '=', $filterValue);
            }
        }
      $this->diligenciamientos = $query->get();
    }

}
