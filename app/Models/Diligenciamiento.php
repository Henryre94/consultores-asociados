<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Diligenciamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fecha_operacion',
        'gps_latitude',
        'gps_longitude',
        'gps_altitude',
        'pdf',
        'version',
        'fuente',
        'legal_declaration',
        'ficha_no',
        'foto_sticker',
        'foto_unidad_residencial',
        'departamento',
        'municipio',
        'centro_poblado',
        'direccion',
        'barrio',
        'informante_calificado',
        'declaracion_juramentada',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'excepciones',
        'firma',
        'firma_link',
        'no_firma_por',
        'correo_electronico',
        'telefono_contacto',
        'tipo_vivienda',
        'material_pisos',
        'material_paredes',
        'servicios_publicos',
        'cuartos',
        'grupos_presupuesto',
        'hogar_numero',
        'de',
        'vivienda_ocupada',
        'tipo_sanitario',
        'agua_consumo',
        'agua_7_dias',
        'agua_24_horas',
        'ubicacion_sanitario',
        'sanitario_tipo',
        'agua_beber',
        'eliminacion_basura',
        'tiene_cocina',
        'ubicacion_cocina',
        'combustible_cocina',
        'bienes_servicios',
        'gasto_alimentacion',
        'gasto_transporte',
        'gasto_educacion',
        'gasto_salud',
        'gasto_servicios_publicos',
        'gasto_celular',
        'gasto_arriendo',
        'gasto_otros',
        'gasto_suma',
        'tiempo_habitando',
        'eventos_afectado',
        'total_personas',
        'total_documentos_validos',
        'mujeres_8_mas',
        'participo_elecciones',
        'lugar_votacion',
        'tipo_ab',
        'apellidos_completos',
        'nombres_completos',
        'sexo',
        'tipo_documento_nacionales',
        'tipo_documento_extranjeros',
        'numero_documento',
        'fecha_nacimiento',
        'edad',
        'limitantes_permanentes',
        'regimen_salud',
        'problema_salud_30_dias',
        'acudio_servicios_salud',
        'fue_atendido',
        'aplica_mujeres_8_59',
        'embarazada',
        'hijos_vivos',
        'donde_permanece_semana',
        'desayuno_almuerzo',
        'sabe_leer_escribir',
        'actualmente_estudia',
        'nivel_educativo',
        'cotiza_pensiones',
        'actividad_principal',
        'condicion_trabajo',
        'recibe_subsidio',
        'grupo_vulnerable',
        'experimento_discriminacion',
        'victima_violencia',
    ];

    /**
     * Get the user that owns the Diligenciamiento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
