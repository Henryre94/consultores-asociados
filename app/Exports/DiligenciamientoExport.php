<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class DiligenciamientoExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths
{
    protected $diligenciamientos;

    public function __construct($diligenciamientos)
    {
        $this->diligenciamientos = $diligenciamientos;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect($this->diligenciamientos->map(function($diligenciamiento) {
            return [
                $diligenciamiento->ficha_no,
                $diligenciamiento->tipo_documento_nacionales,
                $diligenciamiento->numero_documento,
                $diligenciamiento->nombres_completos,
                $diligenciamiento->apellidos_completos,
                $diligenciamiento->departamento,
                $diligenciamiento->edad,
                $diligenciamiento->sexo,
            ];
        }));
    }

    /**
     * Cabezas de columnas para el archivo Excel.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Ficha No.',
            'Tipo Documento',
            'Numero Documento',
            'Nombres',
            'Apellidos',
            'Departamento',
            'Edad',
            'Genero',
        ];
    }

    /**
     * Estilos para las celdas
     *
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para el encabezado
            1    => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => '4CAF50']
                    ]],
            // Puedes agregar más estilos aquí para otras filas o celdas
        ];
    }

    /**
     * Definir anchos de las columnas
     *
     * @return array
     */
    public function columnWidths(): array
    {
        return [
            'A' => 15,  // Ficha No.
            'B' => 20,  // Tipo Documento
            'C' => 20,  // Numero Documento
            'D' => 25,  // Nombres
            'E' => 25,  // Apellidos
            'F' => 20,  // Departamento
            'G' => 10,  // Edad
            'H' => 10,  // Genero
        ];
    }
}
