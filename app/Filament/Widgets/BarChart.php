<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class BarChart extends ChartWidget
{
    protected static ?string $heading = 'Grandes Grupos de Edad';

    public $data;

    public $condition;

    protected function getData(): array
    {
        if (empty($this->data)) {
            return [
                'datasets' => [],
                'labels' => []
            ];
        }

        $fistGroup = 0;
        $secondGroup = 0;
        $thirdGroup = 0;

        if ($this->condition === 'AgeGroups')
        {
        
            foreach ($this->data as $item) {
                if($item->edad < 14)
                    $fistGroup++;
                if($item->edad > 14 && $item->edad < 60)
                    $secondGroup++;
                if($item->edad > 59)
                    $thirdGroup++;
                }
                return [
                    'labels' => ['0-14 años', '15-59 años', '60 o mas años'],
                    'datasets' => [
                        [
                            'label' => '',
                            'data' => [$fistGroup, $secondGroup, $thirdGroup],
                            'backgroundColor' => ['#4A4A4A', '#A26464', '#FFFFFF'],
                            'borderColor' => '#000000',
                            'borderWidth' => 1,
                        ],
                    ],
                ];
        }

        if ($this->condition === 'serviciosPublicos')
        {
            $fourthGroup = 0;
            $fifthGroup = 0;
            $sixtGroup = 0;
        
            foreach ($this->data as $item) {
                if(str_contains($item->servicios_publicos, 'Energía Electrica'))
                    $fistGroup++;
                if(str_contains($item->servicios_publicos, 'Acueducto'))
                    $secondGroup++;
                if(str_contains($item->servicios_publicos, 'Alcantarillado'))
                    $thirdGroup++;
                if(str_contains($item->servicios_publicos, 'Acueducto'))
                    $fourthGroup++;
                if(str_contains($item->servicios_publicos, 'Recolección de Basuras'))
                    $fifthGroup++;
                if(str_contains($item->servicios_publicos, 'Internet'))
                    $sixtGroup++;
                }
                return [
                    'labels' => ['Energía Electrica', 'Acueducto', 'Alcantarillado', 'Acueducto','Recolección de Basuras','Internet'  ],
                    'datasets' => [
                        [
                            'label' => '',
                            'data' => [$fistGroup, $secondGroup, $thirdGroup, $fourthGroup, $fifthGroup, $sixtGroup],
                            'backgroundColor' => ['#4A4A4A', '#A26464', '#FFFFFF'],
                            'borderColor' => '#000000',
                            'borderWidth' => 1,
                        ],
                    ],
                ];
        }

        if ($this->condition === 'serviciosPublicos')
        {
            $fourthGroup = 0;
            $fifthGroup = 0;
            $sixtGroup = 0;
        
            foreach ($this->data as $item) {
                if(str_contains($item->servicios_publicos, 'Energía Electrica'))
                    $fistGroup++;
                if(str_contains($item->servicios_publicos, 'Acueducto'))
                    $secondGroup++;
                if(str_contains($item->servicios_publicos, 'Alcantarillado'))
                    $thirdGroup++;
                }
                return [
                    'labels' => ['Residencial', 'No residencial', 'Mixto' ],
                    'datasets' => [
                        [
                            'label' => '',
                            'data' => [$fistGroup, $secondGroup, $thirdGroup],
                            'backgroundColor' => ['#4A4A4A', '#A26464', '#FFFFFF'],
                            'borderColor' => '#000000',
                            'borderWidth' => 1,
                        ],
                    ],
                ];
        }



        // Return chart data for rendering

    }

    protected function getType(): string
    {
        return 'bar'; 
    }

    public function getHeading(): ?string
    {
    
        if ($this->condition === 'AgeGroups') {
            return 'Grandes Grupos de Edad';
        }

        if ($this->condition === 'serviciosPublicos') {
            return 'Viviendas con acceso a servicios públicos';
        }

        return 'Gráfica de Barras';
    }
}
