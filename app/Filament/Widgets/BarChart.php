<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BarChart extends ChartWidget
{
    protected static ?string $heading = 'Grafica Barras';

    public $data;

    protected function getData(): array
    {
        if($this->data === null)
        {
            return ["<div></div>"];
        }else
        {
            $womenCount = 0;
            $menCount = 0;
            $indefinedCount = 0;

            foreach($this->data as $item){
                if($item['sexo'] === 'M'){
                    $menCount++;
                }elseif($item['sexo'] === 'F'){
                    $womenCount++;
                }else{
                    $indefinedCount++;
                }
            }

            
            return [
                'datasets' => [
                    [
                        'label' => 'Cantidad',
                        'data' => [$menCount, $womenCount, $indefinedCount],
                        'backgroundColor' => ['#4A4A4A','#A26464','#FFFFFF'],
                        'borderColor' => '#000000',
                    ],
                ],
                'labels' => ['Hombres','Mujeres', 'Indefinido'],
            ];
        }
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
