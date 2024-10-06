<?php

namespace App\Imports;

use App\Models\Diligenciamiento;
use App\Models\User;
use DateInterval;
use DateTime;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class DiligenciamientosImport implements ToModel, WithStartRow
{
    /**
     * @return int
     */
    public function startRow(): int
    {
        return 3;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $user = User::where('name', $row[1])->first();
        $user_id = $user ? $user->id : 1;

        return new Diligenciamiento([
            'user_id' => $user_id,
            'fecha_operacion' => $this->convertToSqlDate($row[2]),
            'gps_latitude' => $row[2],
            'gps_longitude' => $row[4],
            'gps_altitude' => $row[5],
            'pdf' => $row[6],
            'version' => $row[7],
            'fuente' => $row[8],
            'legal_declaration' => $row[9],
            'ficha_no' => intval($row[10]),
            'foto_sticker' => $row[11],
            'foto_unidad_residencial' => $row[12],
            'departamento' => $row[13],
            'municipio' => $row[14],
            'centro_poblado' => $row[15],
            'direccion' => $row[16],
            'barrio' => $row[17],
            'informante_calificado' => $row[18],
            'declaracion_juramentada' => $row[19],
            'primer_nombre' => $row[20],
            'segundo_nombre' => $row[21],
            'primer_apellido' => $row[22],
            'segundo_apellido' => $row[23],
            'excepciones' => $row[24],
            'firma' => $row[25] == 'NO' ? false : true,
            'firma_link' => $row[26],
            'no_firma_por' => $row[27],
            'correo_electronico' => $row[28],
            'telefono_contacto' => $row[29],
            'tipo_vivienda' => $row[30],
            'material_pisos' => $row[31],
            'material_paredes' => $row[32],
            'servicios_publicos' => $row[33],
            'cuartos' => $row[34],
            'grupos_presupuesto' => $row[35],
            'hogar_numero' => $row[36],
            'de' => $row[37],
            'vivienda_ocupada' => $row[38],
            'tipo_sanitario' => $row[39],
            'agua_consumo' => $row[40],
            'agua_7_dias' => $row[41] == 'NO' ? false : true,
            'agua_24_horas' => $row[42] == 'NO' ? false : true,
            'ubicacion_sanitario' => $row[43],
            'sanitario_tipo' => $row[44],
            'agua_beber' => $row[45],
            'eliminacion_basura' => $row[46],
            'tiene_cocina' => $row[47] == 'NO' ? false : true,
            'ubicacion_cocina' => $row[48],
            'combustible_cocina' => $row[49],
            'bienes_servicios' => $row[50],
            'gasto_alimentacion' => $row[53],
            'gasto_transporte' => $row[54],
            'gasto_educacion' => $row[55],
            'gasto_salud' => $row[56],
            'gasto_servicios_publicos' => $row[57],
            'gasto_celular' => $row[58],
            'gasto_arriendo' => $row[59],
            'gasto_otros' => $row[60],
            'gasto_suma' => $row[61],
            'tiempo_habitando' => $row[62],
            'eventos_afectado' => $row[63],
            'total_personas' => $row[64],
            'total_documentos_validos' => $row[65],
            'mujeres_8_mas' => $row[66] == '-' ?  0 : $row[66],
            'participo_elecciones' => $row[67] == 'NO' ? false : true,
            'lugar_votacion' => $row[68],
            'tipo_ab' => $row[69] == 'A' ? true : false,
            'apellidos_completos' => $row[70],
            'nombres_completos' => $row[71],
            'sexo' => $row[72],
            'tipo_documento_nacionales' => $row[73],
            'tipo_documento_extranjeros' => $row[74],
            'numero_documento' => $row[75],
            'fecha_nacimiento' => $this->convertToSqlDate($row[76]),
            'edad' => $row[77],
            'limitantes_permanentes' => $row[78],
            'regimen_salud' => $row[79],
            'problema_salud_30_dias' => $row[80] == 'NO' ? false : true,
            'acudio_servicios_salud' => $row[81] == 'NO' ? false : true,
            'fue_atendido' => $row[82] == 'NO' ? false : true,
            'aplica_mujeres_8_59' => $row[83] == 'NO' ? false : true,
            'embarazada' => $row[84] == 'NO' ? false : true,
            'hijos_vivos' => $row[85],
            'donde_permanece_semana' => $row[86],
            'desayuno_almuerzo' => $row[87] == 'NO' ? false : true,
            'sabe_leer_escribir' => $row[88] == 'NO' ? false : true,
            'actualmente_estudia' => $row[89] == 'NO' ? false : true,
            'nivel_educativo' => $row[90],
            'cotiza_pensiones' => $row[91] == 'NO' ? false : true,
            'actividad_principal' => $row[92],
            'condicion_trabajo' => $row[93],
            'recibe_subsidio' => $row[94],
            'grupo_vulnerable' => $row[95],
            'experimento_discriminacion' => $row[96] == 'NO' ? false : true,
            'victima_violencia' => $row[97] == 'NO' ? false : true,
        ]);
    }

    function convertToSqlDate($dateInput) {
        // Primero, intenta convertir el número de serie de Excel
        if (is_numeric($dateInput)) {
            return $this->convertExcelDateToSqlDate((float)$dateInput);
        }

        // Luego, intenta convertir los formatos de fecha proporcionados
        $formats = [
            'd/m/Y h:i a', // Formato con "a.m." y "p.m."
            'd/m/Y h:i A', // Formato con "AM" y "PM"
            'd/m/Y h:i:s', // Formato con "p. m."
            'd/m/Y h:i', // Formato con "p. m."
        ];

        foreach ($formats as $format) {
            $date = DateTime::createFromFormat($format, $dateInput);
            if ($date !== false) {
                return $date->format('Y-m-d H:i:s');
            }
        }

        return null;
    }

    function convertExcelDateToSqlDate($excelDate) {
        try {
            // La fecha base de Excel es el 1 de enero de 1900
            $baseDate = new DateTime('1899-12-30'); // Ajustamos la base a 30-12-1899 para compensar el día 1 y el error de Excel

            // Ajustar la fecha base por el número de días de Excel
            $days = (int)$excelDate;
            $fractionalDay = $excelDate - $days;

            // Crear un intervalo de días
            $interval = new DateInterval('P' . abs($days) . 'D');
            if ($days >= 0) {
                $baseDate->add($interval);
            } else {
                $baseDate->sub($interval);
            }

            // Obtener la fracción del día (hora)
            $hours = $fractionalDay * 24;
            $minutes = ($hours - floor($hours)) * 60;
            $seconds = ($minutes - floor($minutes)) * 60;

            // Ajustar la hora a la fecha base
            $baseDate->setTime((int)$hours, (int)$minutes, (int)$seconds);

            // Formatear la fecha en formato SQL
            return $baseDate->format('Y-m-d H:i:s');
        } catch (Exception $e) {
            return null;
        }
    }
}
