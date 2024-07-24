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
                Forms\Components\Textarea::make('foto_sticker')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('foto_unidad_residencial')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Forms\Components\TextInput::make('excepciones')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Toggle::make('firma')
                    ->required(),
                Forms\Components\Textarea::make('firma_link')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('no_firma_por')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('correo_electronico')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('telefono_contacto')
                    ->tel()
                    ->required()
                    ->numeric(),
                Forms\Components\Textarea::make('tipo_vivienda')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('material_pisos')->label('Material predominante en los pisos')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('material_paredes')->label('Material predominante de las paredes exteriores')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Textarea::make('servicios_publicos')->label('¿Con cuales de los siguientes servicios públicos, privados o comunales cuenta la vivienda?')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Forms\Components\Textarea::make('vivienda_ocupada')->label('La vivienda ocupada por este hogar es:')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tipo_sanitario')->label('¿Qué tipo de sanitario utiliza este hogar?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('agua_consumo')->label('El agua para el consumo o preparación de alimentos la obtienen principalmente de…')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('agua_7_dias')->label('¿El agua llega los siete dias de la semana?'),
                Forms\Components\Toggle::make('agua_24_horas')->label('En los días que llega el agua, ¿el suministro es de 24 horas?'),
                Forms\Components\TextInput::make('ubicacion_sanitario')->label('¿Donde se encuentra el sanitario que usan las personas de este hogar?')
                    ->maxLength(191),
                Forms\Components\TextInput::make('sanitario_tipo')->label('El sanitario que usan las personas de este hogar es:')
                    ->maxLength(191),
                Forms\Components\TextInput::make('agua_beber')->label('El agua para beber principalmente:')
                    ->maxLength(191),
                Forms\Components\TextInput::make('eliminacion_basura')->label('¿Cómo eliminan principalmente la basura en este hogar?')
                    ->maxLength(191),
                Forms\Components\Toggle::make('tiene_cocina')->label('¿El hogar tiene cocina?'),
                Forms\Components\Textarea::make('ubicacion_cocina')->label('La cocina o sitio para preparar los alimentos es:')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('combustible_cocina')->label('¿Qué energía o combustible utiliza principalmente este hogar para cocinar?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Forms\Components\TextInput::make('tiempo_habitando')->label('¿Cuánto tiempo lleva habitando esta vivienda?')
                    ->maxLength(191),
                Forms\Components\Textarea::make('eventos_afectado')->label('Durante el tiempo que lleva habitando su vivienda ha sido afectada por alguno de los siguientes eventos? (si el hogar ha sido afectado)')
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
                Forms\Components\TextInput::make('sexo')
                    ->maxLength(191),
                Forms\Components\TextInput::make('tipo_documento_nacionales')
                    ->maxLength(191),
                Forms\Components\TextInput::make('tipo_documento_extranjeros')
                    ->maxLength(191),
                Forms\Components\TextInput::make('numero_documento')
                    ->numeric(),
                Forms\Components\DatePicker::make('fecha_nacimiento'),
                Forms\Components\TextInput::make('edad')
                    ->numeric(),
                Forms\Components\Textarea::make('limitantes_permanentes')->label('¿Por enfermedad, accidente o de nacimiento tiene limitantes permanentes para?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('regimen_salud')->label('¿Cuál de las siguientes regímenes de seguridad socialen salud esta afiliado como cotizante o beneficiario?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('problema_salud_30_dias')->label('En los ultimos 30 días, ¿tuvo alguna enfermedad, accidente, problema odontológico, o algún problema de salud que no haya implicado hospitalización?'),
                Forms\Components\Toggle::make('acudio_servicios_salud')->label('¿Acudió a una institución prestadora de servicios de salud, un medico general, especialista, odontológico, terapeuta o profesional de la salud?'),
                Forms\Components\Toggle::make('fue_atendido')->label('¿lo atendieron?'),
                Forms\Components\Toggle::make('aplica_mujeres_8_59')->label('Aplica a mujeres entre 8 y 59 años'),
                Forms\Components\Toggle::make('embarazada')->label('¿Esta embarazada?'),
                Forms\Components\Textarea::make('hijos_vivos')->label('¿Ha tenido hijos nacidos vivos?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('donde_permanece_semana')->label('¿Dónde o con quien permanece…durante la mayor parte del tiempo entre semana?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('desayuno_almuerzo')->label('¿Recibe o toma desayuno o almuerzo donde permanece la mayor parte del tiempo entre semana?'),
                Forms\Components\Toggle::make('sabe_leer_escribir')->label('¿Sabe leer y escribir?'),
                Forms\Components\Toggle::make('actualmente_estudia')->label('¿Actualmente estudia (asiste a preescolar, colegio o universidad)?'),
                Forms\Components\Textarea::make('nivel_educativo')->label('¿Cuál es el nivel educativo más alto alcanzado y el último año o grado aprobado en ese nivel?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('cotiza_pensiones')->label('¿Cotiza a un fondo de pensiones?'),
                Forms\Components\TextInput::make('actividad_principal')->label('¿Cuál fue su actividad principal en el ultimo mes?')
                    ->maxLength(191),
                Forms\Components\Textarea::make('condicion_trabajo')->label('En ese trabajo… es:')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('recibe_subsidio')->label('Recibe algun subsidio o ayudas del Estado?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('grupo_vulnerable')->label('Pertenece a algun grupo poblacional vulnerable?')
                    ->maxLength(65535)
                    ->columnSpanFull(),
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
