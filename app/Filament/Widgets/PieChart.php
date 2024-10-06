<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class PieChart extends ChartWidget
{
    protected static ?string $heading = 'Discapacidades por Población';

    public $data;

    protected function getData(): array
    {

        if (empty($this->data)) {
            return [
                'datasets' => [],
                'labels' => []
            ];
        }


        $firstGroup = 0;
        $secondGroup = 0;
        $thirdGroup = 0;
        $fourthGroup = 0;
        $fifthGroup = 0;
        $sixtGroup = 0;


        
        foreach ($this->data as $item) {
            if(str_contains($item->limitantes_permanentes, 'Discapacidad Multiple'))
                $firstGroup++;
            if(str_contains($item->limitantes_permanentes, 'Ninguna de las anteriores'))
                $secondGroup++;
            if(str_contains($item->limitantes_permanentes, 'Discapacidad Fisica') && str_contains($item->limitantes_permanentes, 'Discapacidad Auditiva') || str_contains($item->limitantes_permanentes, 'Discapacidad Afonía') || str_contains($item->limitantes_permanentes, 'Discapacidad Visual'))
                $thirdGroup++;
            if(str_contains($item->limitantes_permanentes, 'Discapacidad Sistémica'))
                $fourthGroup++;
            if(str_contains($item->limitantes_permanentes, 'Discapacidad Auditiva') || str_contains($item->limitantes_permanentes, 'Discapacidad Afonía') || str_contains($item->limitantes_permanentes, 'Discapacidad Visual'))
                $fifthGroup++;
            if(str_contains($item->limitantes_permanentes, 'Dispacidad Psicosocial') || str_contains($item->limitantes_permanentes, 'Dispacidad Mental') || str_contains($item->limitantes_permanentes, 'Dispacidad Intelectual'))
                $sixtGroup++;
        }


            
        return [
            'datasets' => [
                [
                    'label' => 'Modo Torta',
                    'data' => [$firstGroup, $secondGroup, $thirdGroup, $fourthGroup, $fifthGroup, $sixtGroup],
                    'backgroundColor' =>['#4A4A4A', '#A26464', '#FFFFFF', '#FF5733', '#33FF57', '#3357FF', '#F1C40F'],
                    'borderColor' => '#9BD0F5',
                ],
            ],
            'labels' => ['Pluridiscapacidad','Discapacidad Nulo', 'Discapacidad Motora - Discapacidad Sensorial', 'Discapacidad Orgánica', 'Discapacidad Sensorial', 'Discapacidad Mental'],
        ];
        
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
