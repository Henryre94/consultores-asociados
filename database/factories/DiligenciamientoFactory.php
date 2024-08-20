<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diligenciamiento;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diligenciamiento>
 */
class DiligenciamientoFactory extends Factory
{
    protected $model = Diligenciamiento::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'fecha_operacion' => $this->faker->date,
            'gps_latitude' => $this->faker->latitude,
            'gps_longitude' => $this->faker->latitude,
            'gps_altitude' => $this->faker->randomFloat(2, 0, 3000),
            'pdf' => $this->faker->fileExtension,
            'version' => $this->faker->numberBetween(1, 10),
            'fuente' => $this->faker->word,
            'declaracion_juramentada' => $this->faker->sentence,
            'ficha_no' => $this->faker->unique()->numberBetween(1000, 9999),
            'foto_sticker' => $this->faker->imageUrl,
            'departamento' => $this->faker->randomElement(['Magdalena', 'Cundinamarca','Sucre']),
            'municipio' => $this->faker->randomElement(['Sincelejo', 'Chivolo','Monteria']),
            'centro_poblado' => $this->faker->city,
            'direccion' => $this->faker->address,
            'informante_calificado' => $this->faker->boolean,
            'primer_nombre' => $this->faker->firstName,
            'segundo_nombre' => $this->faker->firstName,
            'primer_apellido' => $this->faker->lastName,
            'segundo_apellido' => $this->faker->lastName,
            'excepciones' => $this->faker->word,
            'firma' => $this->faker->boolean,
            'no_firma_por' => $this->faker->sentence,
            'correo_electronico' => $this->faker->email,
            'telefono_contacto' => $this->faker->numberBetween(1, 10),
            'tipo_vivienda' => $this->faker->word,
            'material_paredes' => $this->faker->word,
            'material_pisos' => $this->faker->word,
            'servicios_publicos' => $this->faker->word,
            'cuartos' => $this->faker->numberBetween(1, 10),
            'grupos_presupuesto' => $this->faker->numberBetween(1, 10),
            'hogar_numero' => $this->faker->numberBetween(1, 10),
            'vivienda_ocupada' => $this->faker->boolean,
            'tipo_sanitario' => $this->faker->word,
            'agua_consumo' => $this->faker->word,
            'agua_7_dias' => $this->faker->numberBetween(1, 10),
            'agua_24_horas' => $this->faker->numberBetween(1, 10),
            'ubicacion_sanitario' => $this->faker->word,
            'sanitario_tipo' => $this->faker->word,
            'agua_beber' => $this->faker->word,
            'eliminacion_basura' => $this->faker->word,
            'tiene_cocina' => $this->faker->numberBetween(1, 10),
            'ubicacion_cocina' => $this->faker->word,
            'combustible_cocina' => $this->faker->word,
            'gasto_alimentacion' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_transporte' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_educacion' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_salud' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_servicios_publicos' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_celular' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_arriendo' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_otros' => $this->faker->randomFloat(2, 0, 1000),
            'gasto_suma' => $this->faker->randomFloat(2, 0, 10000),
            'tiempo_habitando' => $this->faker->numberBetween(1, 50),
            'total_personas' => $this->faker->numberBetween(1, 20),
            'total_documentos_validos' => $this->faker->numberBetween(1, 20),
            'mujeres_8_mas' => $this->faker->numberBetween(0, 10),
            'participo_elecciones' => $this->faker->numberBetween(1, 10),
            'lugar_votacion' => $this->faker->word,
            'tipo_ab' => $this->faker->numberBetween(1, 10),
            'apellidos_completos' => $this->faker->lastName . ' ' . $this->faker->lastName,
            'nombres_completos' => $this->faker->firstName . ' ' . $this->faker->firstName,
            'sexo' => $this->faker->randomElement(['Mujer', 'Hombre']),
            'tipo_documento_nacionales' => $this->faker->word,
            'tipo_documento_extranjeros' => $this->faker->word,
            'numero_documento' => $this->faker->unique()->randomNumber(9),
            'fecha_nacimiento' => $this->faker->date,
            'edad' => $this->faker->numberBetween(0, 100),
            'limitantes_permanentes' => $this->faker->word,
            'regimen_salud' => $this->faker->word,
            'problema_salud_30_dias' => $this->faker->numberBetween(1, 10),
            'acudio_servicios_salud' => $this->faker->boolean,
            'fue_atendido' => $this->faker->boolean,
            'embarazada' => $this->faker->boolean,
            'hijos_vivos' => $this->faker->numberBetween(1, 10),
            'desayuno_almuerzo' => $this->faker->numberBetween(1, 10),
            'sabe_leer_escribir' => $this->faker->numberBetween(1, 10),
            'actualmente_estudia' => $this->faker->numberBetween(1, 10),
            'nivel_educativo' => $this->faker->word,
            'cotiza_pensiones' => $this->faker->numberBetween(1, 10),
            'actividad_principal' => $this->faker->word,
            'condicion_trabajo' => $this->faker->word,
            'recibe_subsidio' => $this->faker->numberBetween(1, 10),
            'grupo_vulnerable' => $this->faker->randomElement(['Indígenas', 'Afrocolombiano','Rrom y Población LGTBI','Reinsertado','Desplazado por la Violencia','Desplazado por desastres naturales','Adulto Mayor','Madre cabeza de familia','Población Migrante','Niños y Adolescentes','Expresidiario']),
            'experimento_discriminacion' => $this->faker->numberBetween(1, 10),
            'victima_violencia' => $this->faker->numberBetween(1, 10),
        ];
    }
}
