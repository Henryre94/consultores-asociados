<?php

namespace App\Imports;

use App\Models\Diligenciamiento;
use DateTime;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class DiligenciamientoImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        // Excluye las dos primeras filas
        $filteredRows = $rows->slice(2);
    
        foreach ($filteredRows as $row) {
            $record = Diligenciamiento::find($row[0]);
            
            if (!$record) {
                Diligenciamiento::create([
                    'usuario_movil' => $row[1],
                    'fecha_operacion' => DateTime::createFromFormat('d/m/Y h:i a', $row[2]) ? DateTime::createFromFormat('d/m/Y h:i a', $row[2])->format('Y-m-d H:i:s') : null,
                    'gps_latitud' => $row[3],
                    'gps_longitud' => $row[4],
                    'gps_altitud' => $row[5],
                    'pdf' => $row[6],
                    'version' => $row[7],
                    'fuente' => $row[8],
                    'declaracion_legal' => $row[9],
                    'ficha_no' => $row[10],
                    'foto_sticker' => $row[11],
                    'departamento' => $row[12],
                    'municipio' => $row[13],
                    'centro_poblado' => $row[14],
                    'direccion' => $row[15],
                    'informante_calificado' => $row[16],
                    'fecha_diligenciamiento' => DateTime::createFromFormat('d/m/Y', $row[17]) ? DateTime::createFromFormat('d/m/Y', $row[17])->format('Y-m-d') : null,
                    'primer_nombre' => $row[18],
                    'segundo_nombre' => $row[19],
                    'primer_apellido' => $row[20],
                    'segundo_apellido' => $row[21],
                    'excepciones' => $row[22],
                    'firma' => $row[24],
                    'no_firma_por' => $row[25],
                    'correo_electronico' => $row[26],
                    'telefono_contacto' => $row[27],
                    'tipo_vivienda' => $row[28],
                    'material_paredes' => $row[29],
                    'material_pisos' => $row[30],
                    'servicios_publicos' => $row[31],
                    'cuartos' => $row[32],
                    'grupos_presupuesto' => $row[33],
                    'hogar_numero' => $row[34],
                    'vivienda_ocupada' => $row[36],
                    'tipo_sanitario' => $row[37],
                    'agua_consumo' => $row[38],
                    'agua_7_dias' => $row[39] == 'NO' ? false : true ,
                    'agua_24_horas' => $row[40] == 'NO' ? false : true,
                    'ubicacion_sanitario' => $row[41],
                    'sanitario_tipo' => $row[42],
                    'agua_beber' => $row[43],
                    'eliminacion_basura' => $row[44],
                    'tiene_cocina' => $row[45] == 'NO' ? false : true,
                    'ubicacion_cocina' => $row[46],
                    'combustible_cocina' => $row[47],
                    'gasto_alimentacion' => $row[50],
                    'gasto_transporte' => $row[51],
                    'gasto_educacion' => $row[52],
                    'gasto_salud' => $row[53],
                    'gasto_servicios_publicos' => $row[54],
                    'gasto_celular' => $row[55],
                    'gasto_arriendo' => $row[56],
                    'gasto_otros' => $row[57],
                    'gasto_suma' => $row[58],
                    'tiempo_habitando' => $row[59],
                    'eventos_afectado' => $row[60],
                    'total_personas' => $row[61],
                    'total_documentos_validos' => $row[62],
                    'mujeres_8_mas' => is_numeric($row[63]) ? $row[63] : null,
                    'participo_elecciones' => $row[64] == 'NO' ? false : true,
                    'puesto_votacion' => $row[65],
                    'tipo_ab' => $row[66],
                    'apellidos_completos' => $row[67],
                    'nombres_completos' => $row[68],
                    'sexo' => $row[69],
                    'tipo_documento_nacionales' => $row[70],
                    'tipo_documento_extranjeros' => $row[71],
                    'numero_documento' => $row[72],
                    'fecha_nacimiento' => DateTime::createFromFormat('d/m/Y', $row[73]) ? DateTime::createFromFormat('d/m/Y', $row[73])->format('Y-m-d') : null,
                    'edad' => $row[74],
                    'clasificacion' => $row[75],
                    'limitantes_permanentes' => $row[76],
                    'tipo_discapacidad' => $row[77],
                    'regimen_salud' => $row[78],
                    'problema_salud_30_dias' => $row[79] == 'NO' ? false : true,
                    'acudio_servicios_salud' => $row[80] == 'NO' ? false : true,
                    'fue_atendido' => $row[81] == 'NO' ? false : true,
                    'embarazada' => $row[83] == 'NO' ? false : true,
                    'hijos_vivos' => $row[84],
                    'desayuno_almuerzo' => $row[86] == 'NO' ? false : true,
                    'sabe_leer_escribir' => $row[87] == 'NO' ? false : true,
                    'actualmente_estudia' => $row[88] == 'NO' ? false : true,
                    'nivel_educativo' => $row[89],
                    'cotiza_pensiones' => $row[90] == 'NO' ? false : true,
                    'actividad_principal' => $row[91],
                    'condicion_trabajo' => $row[92],
                    'recibe_subsidio' => $row[93] == 'NO' ? false : true,
                    'grupo_vulnerable' => $row[94] == 'NO' ? false : true,
                    'experimento_discriminacion' => $row[95] == 'NO' ? false : true,
                    'victima_violencia' => $row[96] == 'NO' ? false : true,
                ]);
            }
        }
    }
}
