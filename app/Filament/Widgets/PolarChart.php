<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PolarChart extends ChartWidget
{
    protected static ?string $heading = '';

    public $data;

    protected function getData(): array
    {

        if (empty($this->data)) {
            return [
                'datasets' => [],
                'labels' => []
            ];
        }




            
        return [
            'datasets' => [
                [
                    'label' => 'Modo Polar',
                    'data' => [1,2,3],
                    'backgroundColor' =>['#4A4A4A', '#A26464', '#FFFFFF'],
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Uno', 'dos','tres'],
        ];
        
    }

    protected function getType(): string
    {
        return 'polarArea';
    }
}