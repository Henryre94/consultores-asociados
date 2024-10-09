<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportData extends Model
{
    use HasFactory;

    protected $fillable = [
        'omision',
        'omisionCabecera',
        'omisionPoblado',
        'omisionPorcentaje',
        'noAutoreconocimiento',
        'omisionEdadGrupo1',
        'omisionEdadGrupo2',
        'omisionEdadGrupo3',
        'omisionEdadGrupoArbolMujer1',
        'omisionEdadGrupoArbolHombre1',
        'omisionEdadGrupoArbolMujer2',
        'omisionEdadGrupoArbolHombre2',
        'omisionEdadGrupoArbolMujer3',
        'omisionEdadGrupoArbolHombre3',
        'omisionEdadGrupoArbolMujer4',
        'omisionEdadGrupoArbolHombre4',
        'omisionEdadGrupoArbolMujer5',
        'omisionEdadGrupoArbolHombre5',
        'omisionEdadGrupoArbolMujer6',
        'omisionEdadGrupoArbolHombre6',
        'omisionEdadGrupoArbolMujer7',
        'omisionEdadGrupoArbolHombre7',
        'omisionEdadGrupoArbolMujer8',
        'omisionEdadGrupoArbolHombre8',
        'omisionEdadGrupoArbolMujer9',
        'omisionEdadGrupoArbolHombre9',
        'totalUnidadesVivienda',
        'totalUnidadesViviendaOcupadas',
        'totalResidencial',
        'totalNoResidencial',
        'totalMixto',
        'otroPaisMujer',
        'otroPaisHombre',
        'otroMunicipioMujer',
        'otroMunicipioHombre',
        'esteMunicipioMujer',
        'esteMunicipioHombre',
        'totalHogaresParticulares',
        'indigenas',
        'gitanos',
        'raizales',
        'palenqueros',
        'afrocolombiano',
        'ningunoEtnico',
        'servicioElectrico',
        'servicioAlcantarillado',
        'servicioAcueducto',
        'servicioBasuras',
        'servicioGas',
        'servicioInternet',
    ];
}
