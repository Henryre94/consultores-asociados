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

    public function mount(){

    

    }

    public function choosedFilterFunction()
    {
        $this->choosedFilter = true;
        $this->selectedColums[] = $this->selectedOption;
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
    
    public function getFilteredData()
    {

        $query = Diligenciamiento::query();

        if (count($this->selectedColums) === count($this->filterValues)) {
            // Iterate over the arrays
            foreach ($this->selectedColums as $index => $selectedColum) {
                // Assuming column names are safe to use in SQL (e.g., they are validated or sanitized)
                $filterValue = $this->filterValues[$index];

                // Add a where condition for each column-value pair
                $query->where($selectedColum, '=', $filterValue);
            }
        }
      $this->diligenciamientos = $query->get();
    }



}
