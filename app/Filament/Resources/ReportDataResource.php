<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReportDataResource\Pages;
use App\Filament\Resources\ReportDataResource\RelationManagers;
use App\Models\ReportData;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReportDataResource extends Resource
{
    protected static ?string $model = ReportData::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Datos de Reporte';

    protected static ?string $modelLabel = 'Datos de reporte';

    protected static ?int $navigationSort = 2;

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Superadmin');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Población ajustada por omisión')
                    ->schema([
                        Forms\Components\TextInput::make('omision')->label('Población total ajustada por omisión')
                            ->numeric(),
                        Forms\Components\TextInput::make('omisionCabecera')->label('Población ajustada por omisión en cabecera municipal')
                            ->numeric(),
                        Forms\Components\TextInput::make('omisionPoblado')->label('Población ajustada por omisión en centros poblados y rural disperso')
                            ->numeric(),
                        Forms\Components\TextInput::make('omisionPorcentaje')->label('Omision Porcentaje:')
                            ->numeric(),
                        Forms\Components\TextInput::make('noAutoreconocimiento')->label('Personas que no respondondieron a la pregunta de autoreconocimiento:')
                            ->numeric(),
                    ])->columns(2),
                Forms\Components\Section::make('Omisión por grupos de edad')
                    ->schema([
                        Forms\Components\TextInput::make('omisionEdadGrupo1')->label('Omisión total 0-14')
                            ->numeric(),
                        Forms\Components\TextInput::make('omisionEdadGrupo2')->label('Omisión total 15-59')
                            ->numeric(),
                        Forms\Components\TextInput::make('omisionEdadGrupo3')->label('Omisión total 60 o más')
                            ->numeric(),
                    ])->columns(3),

                Forms\Components\Section::make('Omisión por género y grupo de edad')
                    ->schema([
                        Forms\Components\Section::make('Omisión total 0-4:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer1')->label('mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre1')->label('hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 10-14:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer2')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre2')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 20-24:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer3')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre3')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 30-34:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer4')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre4')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 40-44:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer5')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre5')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 50-54:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer6')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre6')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 60-64:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer7')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre7')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 70-74:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer8')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre8')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                        Forms\Components\Section::make('Omisión total 80 o mas:')
                            ->schema([
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolMujer9')->label('Mujer')
                                    ->numeric(),
                                Forms\Components\TextInput::make('omisionEdadGrupoArbolHombre9')->label('Hombre')
                                    ->numeric(),
                            ])->columns(2),
                    ])->columns(2),

                Forms\Components\Section::make('Unidades de vivienda')
                    ->schema([
                        Forms\Components\TextInput::make('totalUnidadesVivienda')->label('Total unidades de vivienda')
                            ->numeric(),
                        Forms\Components\TextInput::make('totalUnidadesViviendaOcupadas')->label('Total viviendas ocupadas')
                            ->numeric(),
                    ])->columns(2),
                Forms\Components\Section::make('Tipos de vivienda')
                    ->schema([
                        Forms\Components\TextInput::make('totalResidencial')->label('Residencial')
                            ->numeric(),
                        Forms\Components\TextInput::make('totalNoResidencial')->label('No residencial')
                            ->numeric(),
                        Forms\Components\TextInput::make('totalMixto')->label('Mixto')
                            ->numeric(),
                    ])->columns(3),

                Forms\Components\Section::make('Lugar de nacimiento')
                    ->schema([
                        Forms\Components\TextInput::make('otroPaisMujer')->label('Otro Pais Mujer:')
                            ->numeric(),
                        Forms\Components\TextInput::make('otroPaisHombre')->label('Otro Pais Hombre:')
                            ->numeric(),
                        Forms\Components\TextInput::make('otroMunicipioMujer')->label('Otro Municipio Mujer:')
                            ->numeric(),
                        Forms\Components\TextInput::make('otroMunicipioHombre')->label('Otro Municipio Hombre:')
                            ->numeric(),
                        Forms\Components\TextInput::make('esteMunicipioMujer')->label('Este municipio Mujer:')
                            ->numeric(),
                        Forms\Components\TextInput::make('esteMunicipioHombre')->label('Este municipio Hombre:')
                            ->numeric(),
                    ])->columns(3),

                Forms\Components\Section::make('Total hogares')
                    ->schema([
                        Forms\Components\TextInput::make('totalHogaresParticulares')->label('Particulares:')
                            ->numeric(),
                    ])->columns(1),

                Forms\Components\Section::make('La población étnica:')
                    ->schema([
                        Forms\Components\TextInput::make('indigenas')->label('Indigenas:')
                            ->numeric(),
                        Forms\Components\TextInput::make('gitanos')->label('ROM(Gitanos):')
                            ->numeric(),
                        Forms\Components\TextInput::make('raizales')->label('Raizales:')
                            ->numeric(),
                        Forms\Components\TextInput::make('palenqueros')->label('Palenqueros:')
                            ->numeric(),
                        Forms\Components\TextInput::make('afrocolombiano')->label('Afrocolombianos:')
                            ->numeric(),
                        Forms\Components\TextInput::make('ningunoEtnico')->label('Ningún grupo étnico:')
                            ->numeric(),
                    ])->columns(3),

                Forms\Components\Section::make('Servicios Publicos')
                    ->schema([
                        Forms\Components\TextInput::make('servicioElectrico')->label('Energía Electrica:')
                            ->numeric(),
                        Forms\Components\TextInput::make('servicioAlcantarillado')->label('Alcantarillado:')
                            ->numeric(),
                        Forms\Components\TextInput::make('servicioAcueducto')->label('Acueducto:')
                            ->numeric(),
                        Forms\Components\TextInput::make('servicioBasuras')->label('Recoleccion de Basuras:')
                            ->numeric(),
                        Forms\Components\TextInput::make('servicioGas')->label('Gas Natural:')
                            ->numeric(),
                        Forms\Components\TextInput::make('servicioInternet')->label('Internet:')
                            ->numeric(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('omision')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionCabecera')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionPoblado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionPorcentaje')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('noAutoreconocimiento')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupo1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupo2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupo3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre1')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre2')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre3')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer4')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre4')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer5')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre5')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer6')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre6')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer7')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre7')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer8')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre8')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolMujer9')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('omisionEdadGrupoArbolHombre9')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalUnidadesVivienda')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalUnidadesViviendaOcupadas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalResidencial')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalNoResidencial')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalMixto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('otroPaisMujer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('otroPaisHombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('otroMunicipioMujer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('otroMunicipioHombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('esteMunicipioMujer')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('esteMunicipioHombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('totalHogaresParticulares')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('indigenas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gitanos')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('raizales')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('palenqueros')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('afrocolombiano')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ningunoEtnico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioElectrico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioAlcantarillado')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioAcueducto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioBasuras')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioGas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('servicioInternet')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListReportData::route('/'),
            'create' => Pages\CreateReportData::route('/create'),
            'edit' => Pages\EditReportData::route('/{record}/edit'),
        ];
    }
}
