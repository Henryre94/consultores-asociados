<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiligenciamientoResource\Pages;
use App\Filament\Resources\DiligenciamientoResource\RelationManagers;
use App\Models\Diligenciamiento;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Configuration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiligenciamientoResource extends Resource
{
    protected static ?string $model = Diligenciamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function shouldRegisterNavigation(): bool
    {
        $configurations = Configuration::get();
    
        return $configurations->count()>0;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')->label('Usuario que realizo el diligenciamiento')
                    ->relationship('user', 'name'),
                Forms\Components\DateTimePicker::make('fecha_operacion')
                    ->required(),
                Forms\Components\TextInput::make('gps_latitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('gps_longitude')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('gps_altitude')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('pdf')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('version')
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('fuente')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('legal_declaration')->label('La negativa de suministrar la totalidad de la información solicitada impedirá su registro en la base de datos Municipal. Los datos de carácter personal serán objeto de tratamiento por parte de la Alcaldía Municipal de Chibolo - Departamento del Magdalena de acuerdo con lo establecido en la Ley 1581 de 2012 y el Decreto 1377 de 2013 o las normas que lo modifiquen. El Municipio actuará como responsable del tratamiento de datos personales, de acuerdo con la política de tratamiento de datos de la entidad. La información registrada en la caracterización de población y los datos personales serán utilizados para orientar las políticas sociales del Municipio.')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('ficha_no')
                    ->required()
                    ->numeric(),
                Forms\Components\FileUpload::make('foto_sticker')
                    ->required()
                    ->image()
                    ->acceptedFileTypes(['image/jpeg'])
                    ->disk('public')
                    ->directory('images'),
                Forms\Components\FileUpload::make('foto_unidad_residencial')
                    ->required()
                    ->image()
                    ->acceptedFileTypes(['image/jpeg'])
                    ->disk('public')
                    ->directory('images'),
                Forms\Components\TextInput::make('departamento')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('municipio')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('centro_poblado')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('barrio')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('informante_calificado')->label('Informante Calificado del Hogar')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('declaracion_juramentada')->label('Declaración juramentada: bajo la gravedad de juramento declaro que la información suministrada es verdadera y autorizo que sea verificada con otras fuentes de información y que se actualice de forma automática a través del cruce de registros administrativos u otras fuentes que la Alcaldia Municipal defina. Cualquier presunta falsedad identificada a través de cruces de bases de datos generará la exclusión del Sistema, independientemente de las acciones legales que haya lugar.')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('primer_nombre')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('segundo_nombre')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('primer_apellido')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('segundo_apellido')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('excepciones')
                    ->options([
                        'Persona Integrante del Hogar' => 'Persona Integrante del Hogar',
                        'Menor de Edad' => 'Menor de Edad',
                        'Empleado del Hogar' => 'Empleado del Hogar',
                        'Persona no Integrante del Hogar' => 'Persona no Integrante del Hogar',

                    ]),
                Forms\Components\Toggle::make('firma')
                    ->required(),
                Forms\Components\FileUpload::make('firma_link')
                    ->required()
                    ->image()
                    ->acceptedFileTypes(['image/jpeg'])
                    ->disk('public')
                    ->directory('images'),
                Forms\Components\Select::make('no_firma_por')
                    ->required()
                    ->options([
                        'No quiere' => 'No quiere',
                        'Nosabe' => 'Nosabe',
                        'Impedido Físico' => 'Impedido Físico',
                        'Si la Persona si Firma' => 'Si la Persona si Firma',

                    ]),
                Forms\Components\TextInput::make('correo_electronico')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('telefono_contacto')
                    ->tel()
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tipo_vivienda')
                    ->options([
                        'Casa' => 'Casa',
                        'Apartamento' => 'Apartamento',
                        'Cuarto' => 'Cuarto',
                        'Otro tipo de vivienda' => 'Otro tipo de vivienda',
                        'Vivienda indigena' => 'Vivienda indigena'
                    ]),
                Forms\Components\Select::make('material_pisos')->label('Material predominante en los pisos')
                    ->required()
                    ->options([
                        'Alfombra o tapete, mármol, parqué, madera pulida y lacada' => 'Alfombra o tapete, mármol, parqué, madera pulida y lacada',
                        'Baldosa, vinilo, tableta, ladrillo' => 'Baldosa, vinilo, tableta, ladrillo',
                        'Cemento, gravilla' => 'Cemento, gravilla',
                        'Madera burda, madera en mal estado, tabla, tablón' => 'Madera burda, madera en mal estado, tabla, tablón',
                        'Tierra o arena' => 'Tierra o arena',
                        'Otro' => 'Otro',

                    ]),
                Forms\Components\Select::make('material_paredes')->label('Material predominante de las paredes exteriores')
                    ->required()
                    ->options([
                        'Bloque, ladrillo, piedra, madera pulida' => 'Bloque, ladrillo, piedra, madera pulida',
                        'Tapia pisada, adobe' => 'Tapia pisada, adobe',
                        'Bahareque' => 'Bahareque',
                        'Material prefabricado' => 'Material prefabricado',
                        'Madera burda, tabla, tablón' => 'Madera burda, tabla, tablón',
                        'Guadua, caña, esterilla, otro vegetal' => 'Guadua, caña, esterilla, otro vegetal',
                        'Zinc, tela, lona, cartón, latas, desechos, plásticos' => 'Zinc, tela, lona, cartón, latas, desechos, plásticos',
                        'Sin paredes' => 'Sin paredes',

                    ]),
                Forms\Components\Select::make('servicios_publicos')->label('¿Con cuales de los siguientes servicios públicos, privados o comunales cuenta la vivienda?')
                    ->required()
                    ->options([
                        'Energía Electrica' => 'Energía Electrica',
                        'Alcantarillado' => 'Alcantarillado',
                        'Gas natural domiciliario' => 'Gas natural domiciliario',
                        'Recolección de Basuras' => 'Recolección de Basuras',
                        'Acueducto' => 'Acueducto',
                    ]),
                Forms\Components\TextInput::make('cuartos')->label('¿Con cuantos cuartos, excluyendo sala comedor, cuenta la vivienda? (excluida cocina, baños, garajes y cuartos destinados a negocio)')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('grupos_presupuesto')->label('¿Cuántos grupos de personas que manejan su propio presupuesto (hogares)hay en esta vivienda?')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('hogar_numero')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('de')
                    ->numeric(),
                Forms\Components\Select::make('vivienda_ocupada')->label('La vivienda ocupada por este hogar es:')
                    ->options([
                        'En arriendo o subarriendo' => 'En arriendo o subarriendo',
                        'Propia, la estan pagando' => 'Propia, la estan pagando',
                        'Propia, totalmente pagada' => 'Propia, totalmente pagada',
                        'Con permiso del propietario' => 'Con permiso del propietario',
                        'Posesión sin titulo, ocupante de hecho' => 'Posesión sin titulo, ocupante de hecho',

                    ]),
                Forms\Components\Select::make('tipo_sanitario')->label('¿Qué tipo de sanitario utiliza este hogar?')
                    ->options([
                        'Con conexión a alcantarillado' => 'Con conexión a alcantarillado',
                        'Con conexión a pozo séptico' => 'Con conexión a pozo séptico',
                        'Sin conexión a alcantarillado ni a pozo séptico' => 'Sin conexión a alcantarillado ni a pozo séptico',
                        'Letrina, bajamar' => 'Letrina, bajamar',
                        'No tiene' => 'No tiene',

                    ]),
                Forms\Components\Select::make('agua_consumo')->label('El agua para el consumo o preparación de alimentos la obtienen principalmente de…')
                    ->options([
                        'Acueducto' => 'Acueducto',
                        'Pozo con bomba' => 'Pozo con bomba',
                        'Pozo sin bomba, jagüey' => 'Pozo sin bomba, jagüey',
                        'Agua lluvia' => 'Agua lluvia',
                        'Río, quebrada, manantial o nacimiento' => 'Río, quebrada, manantial o nacimiento',
                        'Pila pública' => 'Pila pública',
                        'Carrotanque' => 'Carrotanque',
                        'Aguatero' => 'Aguatero',
                        'Agua embotellada o en bolsa' => 'Agua embotellada o en bolsa',

                    ]),
                Forms\Components\Toggle::make('agua_7_dias')->label('¿El agua llega los siete dias de la semana?'),
                Forms\Components\Toggle::make('agua_24_horas')->label('En los días que llega el agua, ¿el suministro es de 24 horas?'),
                Forms\Components\Select::make('ubicacion_sanitario')->label('¿Donde se encuentra el sanitario que usan las personas de este hogar?')
                    ->options([
                        'Dentro de la vivienda' => 'Dentro de la vivienda',
                        'Fuera de la vivienda' => 'Fuera de la vivienda',

                    ]),
                Forms\Components\Select::make('sanitario_tipo')->label('El sanitario que usan las personas de este hogar es:')
                    ->options([
                        'De uso exclusivo de este hogar' => 'De uso exclusivo de este hogar',
                        'Compartido con hogares de la misma vivienda' => 'Compartido con hogares de la misma vivienda',
                        'Compartido con hogares de otra vivienda' => 'Compartido con hogares de otra vivienda',
                    ]),
                Forms\Components\Select::make('agua_beber')->label('El agua para beber principalmente:')
                    ->options([
                        'La usan tal como la obtienen' => 'La usan tal como la obtienen',
                        'La hierven' => 'La hierven',
                        'Le echan cloro' => 'Le echan cloro',
                        'Utilizan filtros' => 'Utilizan filtros',
                        'La decantan o usan filtros naturales' => 'La decantan o usan filtros naturales',
                        'Compran agua embotellada o en bolsa' => 'Compran agua embotellada o en bolsa',

                    ]),
                Forms\Components\Select::make('eliminacion_basura')->label('¿Cómo eliminan principalmente la basura en este hogar?')
                    ->options([
                        'La recogen los servicios de aseo' => 'La recogen los servicios de aseo',
                        'La entierran' => 'La entierran',
                        'La queman' => 'La queman',
                        'La tiran a un patio, lote, zanja o baldío' => 'La tiran a un patio, lote, zanja o baldío',
                        'La tiran a un río, quebrada, caño o laguna' => 'La tiran a un río, quebrada, caño o laguna',
                        'La recoge un servicio informal (zorra, carreta)' => 'La recoge un servicio informal (zorra, carreta)',
                        'La eliminan de otra forma' => 'La eliminan de otra forma',

                    ]),
                Forms\Components\Toggle::make('tiene_cocina')->label('¿El hogar tiene cocina?'),
                Forms\Components\Select::make('ubicacion_cocina')->label('La cocina o sitio para preparar los alimentos es:')
                    ->options([
                        'De uso exclusivo de las personas de este hogar' => 'De uso exclusivo de las personas de este hogar',
                        'Compartido con hogares de la misma vivienda' => 'Compartido con hogares de la misma vivienda',
                        'Compartido con hogares de otras viviendas' => 'Compartido con hogares de otras viviendas',

                    ]),
                Forms\Components\Select::make('combustible_cocina')->label('¿Qué energía o combustible utiliza principalmente este hogar para cocinar?')
                    ->options([
                        'Electricidad' => 'Electricidad',
                        'Gas natural domiciliario' => 'Gas natural domiciliario',
                        'Gas propano (en cilindro o pipeta)' => 'Gas propano (en cilindro o pipeta)',
                        'Petóleo, gasolina, kerosene, alcohol, cocinol' => 'Petóleo, gasolina, kerosene, alcohol, cocinol',
                        'Carbón mineral' => 'Carbón mineral',
                        'Material de secho, leña, carbón de leña' => 'Material de secho, leña, carbón de leña',
                        'Ninguno (no cocinan)' => 'Ninguno (no cocinan)',

                    ]),
                Forms\Components\Textarea::make('bienes_servicios')->label('¿Cuáles de los siguientes bienes o servicios posee este hogar?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('gasto_alimentacion')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_transporte')->label('Transporte (bus, servicio público, taxis)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_educacion')->label('Educación (pensión, transporte escolar, alimentación escolar)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_salud')->label('Salud (medicamentos, citas médicas, copago, pago EPS)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_servicios_publicos')->label('Servicios públicos (agua, luz, teléfono fijo, recolección de basuras, gas)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_celular')->label('Celular (plan-prepago)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_arriendo')->label('Arriendo, cuota de amortización o cuota de administración')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_otros')->label('Otros (diversión, esparcimiento, deudas, préstamos)')
                    ->numeric(),
                Forms\Components\TextInput::make('gasto_suma')
                    ->numeric(),
                Forms\Components\Select::make('tiempo_habitando')->label('¿Cuánto tiempo lleva habitando esta vivienda?')
                    ->options([
                        'Menos de un año' => 'Menos de un año',
                        'Entre 1 y 5 años' => 'Entre 1 y 5 años',
                        'Más de 5 hasta 10 años' => 'Más de 5 hasta 10 años',
                        'Más de 10 años' => 'Más de 10 años',

                    ]),
                Forms\Components\Select::make('eventos_afectado')->label('Durante el tiempo que lleva habitando su vivienda ha sido afectada por alguno de los siguientes eventos? (si el hogar ha sido afectado)')
                    ->options([
                        'Inundaciones, crecientes, arroyos' => 'Inundaciones, crecientes, arroyos',
                        'Avalanchas, derrumbes o deslizamientos' => 'Avalanchas, derrumbes o deslizamientos',
                        'Terremotos' => 'Terremotos',
                        'Incendios' => 'Incendios',
                        'Vendavales, ventarrones, tormentas' => 'Vendavales, ventarrones, tormentas',
                        'Hundimientos de terreno' => 'Hundimientos de terreno',

                    ]),
                Forms\Components\TextInput::make('total_personas')->label('Total de personas del hogar')
                    ->numeric(),
                Forms\Components\TextInput::make('total_documentos_validos')->label('Total de personas con documento válido en el hogar')
                    ->numeric(),
                Forms\Components\TextInput::make('mujeres_8_mas')->label('Mujeres 8 años y mas')
                    ->numeric(),
                Forms\Components\Toggle::make('participo_elecciones')->label('Usted participo en las ultimas contiendas electorales?'),
                Forms\Components\Textarea::make('lugar_votacion')->label('¿En que lugar de Votación?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('tipo_ab')->label('TIPO A/B'),
                Forms\Components\TextInput::make('apellidos_completos')
                    ->maxLength(191),
                Forms\Components\TextInput::make('nombres_completos')
                    ->maxLength(191),
                Forms\Components\Select::make('sexo')
                    ->options([
                        'Hombre' => 'Hombre',
                        'Mujer' => 'Mujer',

                    ]),
                Forms\Components\Select::make('tipo_documento_nacionales')
                    ->options([
                        'Registro Civil' => 'Registro Civil',
                        'Tarjeta de Identidad' => 'Tarjeta de Identidad',
                        'Cedula de Ciudadanía' => 'Cedula de Ciudadanía',

                    ]),
                Forms\Components\Select::make('tipo_documento_extranjeros')
                    ->options([
                        'Cédula de Extranjería' => 'Cédula de Extranjería',
                        'DNI (país de origen)' => 'DNI (país de origen)',
                        'Pasaporte' => 'Pasaporte',
                        'Salvoconducto para refugiado' => 'Salvoconducto para refugiado',
                        'Permiso especial de permanencia' => 'Permiso especial de permanencia',

                    ]),
                Forms\Components\TextInput::make('numero_documento')
                    ->numeric(),
                Forms\Components\DatePicker::make('fecha_nacimiento'),
                Forms\Components\TextInput::make('edad')
                    ->numeric(),
                Forms\Components\Select::make('limitantes_permanentes')->label('¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?')
                    ->options([
                        'Discapacidad Fisica' => 'Discapacidad Fisica',
                        'Discapacidad Intelectual' => 'Discapacidad Intelectual',
                        'Discapacidad Mental' => 'Discapacidad Mental',
                        'Discapacidad Psicosocial' => 'Discapacidad Psicosocial',
                        'Discapacidad Auditiva' => 'Discapacidad Auditiva',
                        'Discapacidad Visual' => 'Discapacidad Visual',
                        'Discapacidad Sistémica' => 'Discapacidad Sistémica',
                        'Discapacidad Afonía' => 'Discapacidad Afonía',
                        'Discapacidad Multiple' => 'Discapacidad Multiple',
                        'Ninguna de las anteriores' => 'Ninguna de las anteriores',

                    ]),
                Forms\Components\Select::make('regimen_salud')->label('¿Cuál de las siguientes regímenes de seguridad socialen salud esta afiliado como cotizante o beneficiario?')
                    ->options([
                        'Contributivo (EPS)' => 'Contributivo (EPS)',
                        'Especial (Fuerzas Armadas, Ecopetrol, universidades públicas, magisterio)' => 'Especial (Fuerzas Armadas, Ecopetrol, universidades públicas, magisterio)',
                        'Subsidiado (EPS-S)' => 'Subsidiado (EPS-S)',
                        'Ninguna' => 'Ninguna',
                        'No sabe' => 'No sabe',

                    ]),
                Forms\Components\Toggle::make('problema_salud_30_dias')->label('En los ultimos 30 días, ¿tuvo alguna enfermedad, accidente, problema odontológico, o algún problema de salud que no haya implicado hospitalización?'),
                Forms\Components\Toggle::make('acudio_servicios_salud')->label('¿Acudió a una institución prestadora de servicios de salud, un medico general, especialista, odontológico, terapeuta o profesional de la salud?'),
                Forms\Components\Toggle::make('fue_atendido')->label('¿lo atendieron?'),
                Forms\Components\Toggle::make('aplica_mujeres_8_59')->label('Aplica a mujeres entre 8 y 59 años'),
                Forms\Components\Toggle::make('embarazada')->label('¿Esta embarazada?'),
                Forms\Components\Textarea::make('hijos_vivos')->label('¿Ha tenido hijos nacidos vivos?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('donde_permanece_semana')->label('¿Dónde o con quien permanece…durante la mayor parte del tiempo entre semana?')
                    ->options([
                        'Asiste a un hogar comunitario, jardín o centro de desarrollo infantil o colegio' => 'Asiste a un hogar comunitario, jardín o centro de desarrollo infantil o colegio',
                        'Con su padre o madre en la casa' => 'Con su padre o madre en la casa',
                        'Con su padre o madre en el trabajo' => 'Con su padre o madre en el trabajo',
                        'Con la empleada o niñera en la casa' => 'Con la empleada o niñera en la casa',
                        'Al cuidado de un pariente de 18 años o más' => 'Al cuidado de un pariente de 18 años o más',
                        'Al cuidado de un pariente menor de 18 años' => 'Al cuidado de un pariente menor de 18 años',
                        'En casa solo' => 'En casa solo',
                        'Otro' => 'Otro',

                    ]),
                Forms\Components\Toggle::make('desayuno_almuerzo')->label('¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo entre semana?'),
                Forms\Components\Toggle::make('sabe_leer_escribir')->label('¿Sabe leer y escribir?'),
                Forms\Components\Toggle::make('actualmente_estudia')->label('¿Actualmente estudia (asiste a preescolar, colegio o universidad)?'),
                Forms\Components\Select::make('nivel_educativo')->label('¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado en ese nivel?')
                    ->options([
                        'Ninguno' => 'Ninguno',
                        'Preescolar' => 'Preescolar',
                        'Básica primaria (1.° - 5.°)' => 'Básica primaria (1.° - 5.°)',
                        'Básica secundaria (6.° - 9.°)' => 'Básica secundaria (6.° - 9.°)',
                        'Media (10.° - 13.°)' => 'Media (10.° - 13.°)',
                        'Técnico o tecnológico (1 - 4)' => 'Técnico o tecnológico (1 - 4)',
                        'Universitario (1 - 6)' => 'Universitario (1 - 6)',
                        'Postgrado (1 - 4)' => 'Postgrado (1 - 4)',

                    ]),
                Forms\Components\Toggle::make('cotiza_pensiones')->label('¿Cotiza a un fondo de pensiones?'),
                Forms\Components\Select::make('actividad_principal')->label('¿Cuál fue su actividad principal en el ultimo mes?')
                    ->options([
                        'Trabajando' => 'Trabajando',
                        'Buscando trabajo' => 'Buscando trabajo',
                        'Estudiando' => 'Estudiando',
                        'Oficios del hogar' => 'Oficios del hogar',
                        'Rentista' => 'Rentista',
                        'Jubilado o pensionado' => 'Jubilado o pensionado',
                        'Incapacitado permanente para trabajar' => 'Incapacitado permanente para trabajar',
                        'Sin actividad' => 'Sin actividad',

                    ]),
                Forms\Components\Select::make('condicion_trabajo')->label('En ese trabajo… es:')
                    ->options([
                        'Empleado de empresa particular' => 'Empleado de empresa particular',
                        'Empleado del gobierno' => 'Empleado del gobierno',
                        'Empleado doméstico' => 'Empleado doméstico',
                        'Profesional independiente' => 'Profesional independiente',
                        'Trabajador independiente o por cuenta propia' => 'Trabajador independiente o por cuenta propia',
                        'Patrón o empleador' => 'Patrón o empleador',
                        'Trabajador de finca, tierra o parcela propia, en arriendo, aparcería o usufructo' => 'Trabajador de finca, tierra o parcela propia, en arriendo, aparcería o usufructo',
                        'Trabajador sin remuneración' => 'Trabajador sin remuneración',
                        'Ayudante sin remuneración (hijo o familiar de empleados domésticos, mayordomos, jornaleros, etc)' => 'Ayudante sin remuneración (hijo o familiar de empleados domésticos, mayordomos, jornaleros, etc)',
                        'Jornalero o peón' => 'Jornalero o peón',
                        'Ninguna de las Anteriores' => 'Ninguna de las Anteriores',

                    ]),
                Forms\Components\Select::make('recibe_subsidio')->label('Recibe algun subsidio o ayudas del Estado?')
                    ->options([
                        'Ninguno' => 'Ninguno',
                        'Familias en acción' => 'Familias en acción',
                        'Jovenes en acción' => 'Jovenes en acción',
                        'Colombia mayor' => 'Colombia mayor',
                        'Renta ciudadana' => 'Renta ciudadana',
                        'Devolución del IVA' => 'Devolución del IVA',
                        'Mi Casa YA' => 'Mi Casa YA',
                        'Otros subsidios del Estado' => 'Otros subsidios del Estado',

                    ]),
                Forms\Components\Select::make('grupo_vulnerable')->label('Pertenece a algun grupo poblacional vulnerable?')
                    ->options([
                        'Indígenas' => 'Indígenas',
                        'Afrocolombiano' => 'Afrocolombiano',
                        'Rrom y Población LGTBI' => 'Rrom y Población LGTBI',
                        'Reinsertado' => 'Reinsertado',
                        'Desplazado por la Violencia' => 'Desplazado por la Violencia',
                        'Desplazado por desastres naturales' => 'Desplazado por desastres naturales',
                        'Adulto Mayor' => 'Adulto Mayor',
                        'Madre cabeza de familia' => 'Madre cabeza de familia',
                        'Población Migrante' => 'Población Migrante',
                        'Niños y Adolescentes' => 'Niños y Adolescentes',
                        'Expresidiario' => 'Expresidiario',

                    ]),
                Forms\Components\Toggle::make('experimento_discriminacion')->label('¿Ha experimentado usted o algún miembro de su hogar alguna forma de discriminación en los últimos 12 meses? (racial, étnica, de género, orientación sexual, etc.)'),
                Forms\Components\Toggle::make('victima_violencia')->label('¿Ha sido víctima de violencia física, emocional o sexual en los últimos 12 meses?'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_operacion')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gps_latitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gps_longitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gps_altitude')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('version')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ficha_no')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('departamento')
                    ->searchable(),
                Tables\Columns\TextColumn::make('municipio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('centro_poblado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('barrio')
                    ->searchable(),
                Tables\Columns\TextColumn::make('primer_nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('segundo_nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('primer_apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('segundo_apellido')
                    ->searchable(),
                Tables\Columns\TextColumn::make('excepciones')
                    ->searchable(),
                Tables\Columns\IconColumn::make('firma')
                    ->boolean(),
                Tables\Columns\TextColumn::make('correo_electronico')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telefono_contacto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('material_pisos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('material_paredes')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cuartos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('grupos_presupuesto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hogar_numero')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('de')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('agua_7_dias')
                    ->boolean(),
                Tables\Columns\IconColumn::make('agua_24_horas')
                    ->boolean(),
                Tables\Columns\TextColumn::make('ubicacion_sanitario')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sanitario_tipo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agua_beber')
                    ->searchable(),
                Tables\Columns\TextColumn::make('eliminacion_basura')
                    ->searchable(),
                Tables\Columns\IconColumn::make('tiene_cocina')
                    ->boolean(),
                Tables\Columns\TextColumn::make('gasto_alimentacion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_transporte')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_educacion')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_salud')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_servicios_publicos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_celular')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_arriendo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_otros')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gasto_suma')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tiempo_habitando')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_personas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_documentos_validos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mujeres_8_mas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('participo_elecciones')
                    ->boolean(),
                Tables\Columns\IconColumn::make('tipo_ab')
                    ->boolean(),
                Tables\Columns\TextColumn::make('apellidos_completos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombres_completos')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sexo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_documento_nacionales')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tipo_documento_extranjeros')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_documento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('edad')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('problema_salud_30_dias')
                    ->boolean(),
                Tables\Columns\IconColumn::make('acudio_servicios_salud')
                    ->boolean(),
                Tables\Columns\IconColumn::make('fue_atendido')
                    ->boolean(),
                Tables\Columns\IconColumn::make('aplica_mujeres_8_59')
                    ->boolean(),
                Tables\Columns\IconColumn::make('embarazada')
                    ->boolean(),
                Tables\Columns\IconColumn::make('desayuno_almuerzo')
                    ->boolean(),
                Tables\Columns\IconColumn::make('sabe_leer_escribir')
                    ->boolean(),
                Tables\Columns\IconColumn::make('actualmente_estudia')
                    ->boolean(),
                Tables\Columns\IconColumn::make('cotiza_pensiones')
                    ->boolean(),
                Tables\Columns\TextColumn::make('actividad_principal')
                    ->searchable(),
                Tables\Columns\IconColumn::make('experimento_discriminacion')
                    ->boolean(),
                Tables\Columns\IconColumn::make('victima_violencia')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiligenciamientos::route('/'),
            'create' => Pages\CreateDiligenciamiento::route('/create'),
            'edit' => Pages\EditDiligenciamiento::route('/{record}/edit'),
        ];
    }
}
