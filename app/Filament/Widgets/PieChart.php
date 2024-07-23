<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PieChart extends ChartWidget
{
    protected static ?string $heading = 'Grafica Torta';

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
                        'label' => 'Modo Torta',
                        'data' => [$menCount, $womenCount, $indefinedCount],
                        'backgroundColor' => ['#4A4A4A','#A26464','#FFFFFF'],
                        'borderColor' => '#9BD0F5',
                    ],
                ],
                'labels' => ['Hombres','Mujeres', 'Indefinido'],
            ];
        }
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
