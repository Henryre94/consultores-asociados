<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LogoResource\Pages;
use App\Filament\Resources\LogoResource\RelationManagers;
use App\Models\Logo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Configuration;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LogoResource extends Resource
{
    protected static ?string $model = Logo::class;

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
                Forms\Components\FileUpload::make('logo_alcaldia')
                ->preserveFilenames()
                ->image()
                ->acceptedFileTypes(['image/jpeg'])
                ->disk('public')
                ->directory('images'),
                Forms\Components\FileUpload::make('logo_departamento')
                ->preserveFilenames()
                ->image()
                ->acceptedFileTypes(['image/jpeg'])
                ->disk('public')
                ->directory('images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('logo_consultores')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo_alcaldia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo_departamento')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('departamento')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('municipio')
                    ->searchable(),    
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
            'index' => Pages\ListLogos::route('/'),
            'create' => Pages\CreateLogo::route('/create'),
            'edit' => Pages\EditLogo::route('/{record}/edit'),
        ];
    }
}
