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
            $table->id(); // ID Diligenciamiento
            $table->foreignId('user_id')->nullable()->constrained(); // Usuario Móvil
            $table->dateTime('fecha_operacion')->nullable(); // Fecha de operación
            $table->string('gps_latitude')->nullable(); // Gps latitude
            $table->string('gps_longitude')->nullable(); // Gps longitude
            $table->string('gps_altitude')->nullable(); // Gps altitude
            $table->text('pdf')->nullable(); // Pdf
            $table->integer('version')->nullable(); // Versión
            $table->text('fuente')->nullable(); // Fuente
            $table->text('legal_declaration')->nullable(); // Legal declaration
            $table->integer('ficha_no')->nullable(); // Ficha No.
            $table->text('foto_sticker')->nullable(); // Foto Sticker
            $table->text('foto_unidad_residencial')->nullable(); // Foto Unidad Residencial
            $table->string('departamento')->nullable(); // Departamento
            $table->string('municipio')->nullable(); // Municipio
            $table->string('centro_poblado')->nullable(); // Centro Poblado
            $table->string('direccion')->nullable(); // Dirección
            $table->string('barrio')->nullable(); // Barrio
            $table->text('informante_calificado')->nullable(); // Informante Calificado del Hogar
            $table->text('declaracion_juramentada')->nullable(); // Declaración juramentada
            $table->string('primer_nombre')->nullable(); // Primer Nombre
            $table->string('segundo_nombre')->nullable(); // Segundo Nombre
            $table->string('primer_apellido')->nullable(); // Primer Apellido
            $table->string('segundo_apellido')->nullable(); // Segundo Apellido
            $table->string('excepciones')->nullable(); // Excepciones
            $table->boolean('firma')->nullable(); // Firma
            $table->text('firma_link')->nullable(); // Firma Link
            $table->text('no_firma_por')->nullable(); // No Firma Por
            $table->string('correo_electronico')->nullable(); // Correo Electrónico
            $table->bigInteger('telefono_contacto')->nullable(); // Telefono de Contacto
            $table->text('tipo_vivienda')->nullable(); // Tipo de Vivienda
            $table->string('material_pisos')->nullable(); // Material predominante en los pisos
            $table->string('material_paredes')->nullable(); // Material predominante de las paredes exteriores
            $table->text('servicios_publicos')->nullable(); // ¿Con cuales de los siguientes servicios públicos, privados o comunales cuenta la vivienda?
            $table->string('cuartos')->nullable(); // ¿Con cuantos cuartos, excluyendo sala comedor, cuenta la vivienda?
            $table->string('grupos_presupuesto')->nullable(); // ¿Cuántos grupos de personas que manejan su propio presupuesto (hogares) hay en esta vivienda?
            $table->string('hogar_numero')->nullable(); // Hogar Numero
            $table->string('de')->nullable(); // De
            $table->text('vivienda_ocupada')->nullable(); // ¿La vivienda donde reside su hogar es?
            $table->text('tipo_sanitario')->nullable(); // ¿Qué tipo de sanitario utiliza este hogar?
            $table->text('agua_consumo')->nullable(); // El agua para el consumo o preparación de alimentos la obtienen principalmente de…
            $table->boolean('agua_7_dias')->nullable(); // ¿El agua llega los siete dias de la semana?
            $table->boolean('agua_24_horas')->nullable(); // En los días que llega el agua, ¿el suministro es de 24 horas?
            $table->string('ubicacion_sanitario')->nullable(); // ¿Donde se encuentra el sanitario que usan las personas de este hogar?
            $table->string('sanitario_tipo')->nullable(); // El sanitario que usan las personas de este hogar es
            $table->string('agua_beber')->nullable(); // El agua para beber principalmente
            $table->string('eliminacion_basura')->nullable(); // ¿Cómo eliminan principalmente la basura en este hogar?
            $table->boolean('tiene_cocina')->nullable(); // ¿El hogar tiene cocina?
            $table->text('ubicacion_cocina')->nullable(); // La cocina o sitio para preparar los alimentos es
            $table->text('combustible_cocina')->nullable(); // ¿Qué energía o combustible utiliza principalmente este hogar para cocinar?
            $table->text('bienes_servicios')->nullable(); // ¿Cuáles de los siguientes bienes o servicios posee este hogar?
            $table->integer('gasto_alimentacion')->nullable(); // Alimentación
            $table->integer('gasto_transporte')->nullable(); // Transporte (bus, servicio público, taxis)
            $table->integer('gasto_educacion')->nullable(); // Educación (pensión, transporte escolar, alimentación escolar)
            $table->integer('gasto_salud')->nullable(); // Salud (medicamentos, citas médicas, copago, pago EPS)
            $table->integer('gasto_servicios_publicos')->nullable(); // Servicios públicos (agua, luz, teléfono fijo, recolección de basuras, gas)
            $table->integer('gasto_celular')->nullable(); // Celular (plan-prepago)
            $table->integer('gasto_arriendo')->nullable(); // Arriendo, cuota de amortización o cuota de administración
            $table->integer('gasto_otros')->nullable(); // Otros (diversión, esparcimiento, deudas, préstamos)
            $table->integer('gasto_suma')->nullable(); // Suma
            $table->string('tiempo_habitando')->nullable(); // ¿Cuánto tiempo lleva habitando esta vivienda?
            $table->text('eventos_afectado')->nullable(); // Durante el tiempo que lleva habitando su vivienda ha sido afectada por alguno de los siguientes eventos?
            $table->integer('total_personas')->nullable(); // Total de personas del hogar
            $table->integer('total_documentos_validos')->nullable(); // Total de personas con documento válido en el hogar
            $table->integer('mujeres_8_mas')->nullable(); // Mujeres 8 años y mas
            $table->boolean('participo_elecciones')->nullable(); // ¿Usted participo en las ultimas contiendas electorales?
            $table->text('lugar_votacion')->nullable(); // ¿En que lugar de Votación?
            $table->boolean('tipo_ab')->nullable(); // TIPO A/B
            $table->string('apellidos_completos')->nullable(); // Apellidos Completos
            $table->string('nombres_completos')->nullable(); // Nombre Completos
            $table->string('sexo')->nullable(); // Sexo
            $table->string('tipo_documento_nacionales')->nullable(); // Tipo de documento de identidad Nacionales
            $table->string('tipo_documento_extranjeros')->nullable(); // Tipo de documento de identidad Extranjeros
            $table->string('numero_documento')->nullable(); // Número de documento de identidad
            $table->date('fecha_nacimiento')->nullable(); // Fecha de Naciemiento
            $table->integer('edad')->nullable(); // Edad
            $table->text('limitantes_permanentes')->nullable(); // ¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?
            $table->text('regimen_salud')->nullable(); // ¿Cuál de las siguientes regímenes de seguridad social en salud esta afiliado como cotizante o beneficiario?
            $table->boolean('problema_salud_30_dias')->nullable(); // En los ultimos 30 días, ¿tuvo alguna enfermedad, accidente, problema odontológico, o algún problema de salud que no haya implicado hospitalización?
            $table->boolean('acudio_servicios_salud')->nullable(); // ¿Acudió a una institución prestadora de servicios de salud, un medico general, especialista, odontológico, terapeuta o profesional de la salud?
            $table->boolean('fue_atendido')->nullable(); // ¿Lo atendieron?
            $table->boolean('aplica_mujeres_8_59')->nullable(); // Aplica a mujeres entre 8 y 59 años
            $table->boolean('embarazada')->nullable(); // ¿Esta embarazada?
            $table->text('hijos_vivos')->nullable(); // ¿Ha tenido hijos nacidos vivos?
            $table->text('donde_permanece_semana')->nullable(); // ¿Dónde o con quien permanece durante la mayor parte del tiempo entre semana?
            $table->boolean('desayuno_almuerzo')->nullable(); // ¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo entre semana?
            $table->boolean('sabe_leer_escribir')->nullable(); // ¿Sabe leer y escribir?
            $table->boolean('actualmente_estudia')->nullable(); // ¿Actualmente estudia (asiste a preescolar, colegio o universidad)?
            $table->text('nivel_educativo')->nullable(); // ¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado en ese nivel?
            $table->boolean('cotiza_pensiones')->nullable(); // ¿Cotiza actualmente a pensiones?
            $table->string('actividad_principal')->nullable(); // ¿Cuál es su actividad principal en la semana pasada?
            $table->text('condicion_trabajo')->nullable(); // ¿Cuál es su condición en el trabajo u ocupación principal?
            $table->text('recibe_subsidio')->nullable(); // ¿Recibe subsidio, transferencia monetaria condicionada o no condicionada?
            $table->text('grupo_vulnerable')->nullable(); // ¿Pertenece a algún grupo étnico o vulnerable?
            $table->boolean('experimento_discriminacion')->nullable(); // ¿Ha experimentado discriminación?
            $table->boolean('victima_violencia')->nullable(); // ¿Ha sido victima de violencia por conflicto armado, intrafamiliar o genero?
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
