<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diligenciamientos', function (Blueprint $table) {
            $table->id();
            $table->string('usuario_movil');
            $table->timestamp('fecha_operacion');
            $table->decimal('gps_latitud', 10, 8);
            $table->decimal('gps_longitud', 11, 8);
            $table->decimal('gps_altitud', 8, 2)->nullable();
            $table->text('pdf')->nullable();
            $table->string('version')->nullable();
            $table->string('fuente')->nullable();
            $table->text('declaracion_legal')->nullable();
            $table->string('ficha_no')->nullable();
            $table->text('foto_sticker')->nullable();
            $table->string('departamento')->nullable();
            $table->string('municipio')->nullable();
            $table->string('centro_poblado')->nullable();
            $table->string('direccion')->nullable();
            $table->string('informante_calificado')->nullable();
            $table->timestamp('fecha_diligenciamiento')->nullable();
            $table->string('primer_nombre')->nullable();
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->text('excepciones')->nullable();
            $table->text('firma')->nullable();
            $table->string('no_firma_por')->nullable();
            $table->string('correo_electronico')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('tipo_vivienda')->nullable();
            $table->string('material_paredes')->nullable();
            $table->string('material_pisos')->nullable();
            $table->text('servicios_publicos')->nullable();
            $table->integer('cuartos')->nullable();
            $table->integer('grupos_presupuesto')->nullable();
            $table->integer('hogar_numero')->nullable();
            $table->string('vivienda_ocupada')->nullable();
            $table->string('tipo_sanitario')->nullable();
            $table->string('agua_consumo')->nullable();
            $table->boolean('agua_7_dias')->nullable();
            $table->boolean('agua_24_horas')->nullable();
            $table->string('ubicacion_sanitario')->nullable();
            $table->string('sanitario_tipo')->nullable();
            $table->string('agua_beber')->nullable();
            $table->string('eliminacion_basura')->nullable();
            $table->boolean('tiene_cocina')->nullable();
            $table->string('ubicacion_cocina')->nullable();
            $table->string('combustible_cocina')->nullable();
            $table->decimal('gasto_alimentacion', 10, 2)->nullable();
            $table->decimal('gasto_transporte', 10, 2)->nullable();
            $table->decimal('gasto_educacion', 10, 2)->nullable();
            $table->decimal('gasto_salud', 10, 2)->nullable();
            $table->decimal('gasto_servicios_publicos', 10, 2)->nullable();
            $table->decimal('gasto_celular', 10, 2)->nullable();
            $table->decimal('gasto_arriendo', 10, 2)->nullable();
            $table->decimal('gasto_otros', 10, 2)->nullable();
            $table->decimal('gasto_suma', 10, 2)->nullable();
            $table->string('tiempo_habitando')->nullable();
            $table->string('eventos_afectado')->nullable();
            $table->integer('total_personas')->nullable();
            $table->integer('total_documentos_validos')->nullable();
            $table->integer('mujeres_8_mas')->nullable();
            $table->boolean('participo_elecciones')->nullable();
            $table->string('puesto_votacion')->nullable();
            $table->string('tipo_ab')->nullable();
            $table->string('apellidos_completos')->nullable();
            $table->string('nombres_completos')->nullable();
            $table->string('sexo')->nullable();
            $table->string('tipo_documento_nacionales')->nullable();
            $table->string('tipo_documento_extranjeros')->nullable();
            $table->string('numero_documento')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->string('clasificacion')->nullable();
            $table->string('limitantes_permanentes')->nullable();
            $table->string('tipo_discapacidad')->nullable();
            $table->string('regimen_salud')->nullable();
            $table->boolean('problema_salud_30_dias')->nullable();
            $table->boolean('acudio_servicios_salud')->nullable();
            $table->boolean('fue_atendido')->nullable();
            $table->boolean('embarazada')->nullable();
            $table->string('hijos_vivos')->nullable();
            $table->boolean('desayuno_almuerzo')->nullable();
            $table->boolean('sabe_leer_escribir')->nullable();
            $table->boolean('actualmente_estudia')->nullable();
            $table->string('nivel_educativo')->nullable();
            $table->boolean('cotiza_pensiones')->nullable();
            $table->string('actividad_principal')->nullable();
            $table->string('condicion_trabajo')->nullable();
            $table->boolean('recibe_subsidio')->nullable();
            $table->boolean('grupo_vulnerable')->nullable();
            $table->boolean('experimento_discriminacion')->nullable();
            $table->boolean('victima_violencia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diligenciamientos');
    }
};
