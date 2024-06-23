<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diligenciamiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_movil',
        'fecha_operacion',
        'gps_latitud',
        'gps_longitud',
        'gps_altitud',
        'pdf',
        'version',
        'fuente',
        'declaracion_legal',
        'ficha_no',
        'foto_sticker',
        'departamento',
        'municipio',
        'centro_poblado',
        'direccion',
        'informante_calificado',
        'fecha_diligenciamiento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido',
        'excepciones',
        'firma',
        'no_firma_por',
        'correo_electronico',
        'telefono_contacto',
        'tipo_vivienda',
        'material_paredes',
        'material_pisos',
        'servicios_publicos',
        'cuartos',
        'grupos_presupuesto',
        'hogar_numero',
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
        'puesto_votacion',
        'tipo_ab',
        'apellidos_completos',
        'nombres_completos',
        'sexo',
        'tipo_documento_nacionales',
        'tipo_documento_extranjeros',
        'numero_documento',
        'fecha_nacimiento',
        'edad',
        'clasificacion',
        'limitantes_permanentes',
        'tipo_discapacidad',
        'regimen_salud',
        'problema_salud_30_dias',
        'acudio_servicios_salud',
        'fue_atendido',
        'embarazada',
        'hijos_vivos',
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
}
