<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Livewire\Livewire;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Diligenciamiento;
use App\Models\Configuration;

class PdfController extends Controller
{
    public function generatePdf(Diligenciamiento $diligenciamiento, Configuration $configuration)
    {
        $diligenciamientos = Diligenciamiento::where('ficha_no',  $diligenciamiento->ficha_no)->where('id', '!=', $diligenciamiento->id)->get();
        
        $pdf = Pdf::loadView('pdf_view',compact('diligenciamiento', 'configuration', 'diligenciamientos'));
        
        return $pdf->stream();
    }





        public function generateReport(Request $request)
    {

        $configurations = Configuration::query()->get();

        $diligenciamientos = Diligenciamiento::query()->get();

        $count = count($diligenciamientos);

        $omision = $request->query('omision');

        $omisionCabecera = $request->query('omisionCabecera');

        $omisionPoblado = $request->query('omisionPoblado');

        $noAutoreconocimiento = $request->query('noAutoreconocimiento');

        $omisionPorcentaje = $request->query('omisionPorcentaje');

        $omisionEdadGrupo1 = $request->query('omisionEdadGrupo1');

        $omisionEdadGrupo2 = $request->query('omisionEdadGrupo2');

        $omisionEdadGrupo3 = $request->query('omisionEdadGrupo3');

        $omisionEdadGrupoArbolMujer1 = $request->query('omisionEdadGrupoArbolMujer1');

        $omisionEdadGrupoArbolMujer2 = $request->query('omisionEdadGrupoArbolMujer2');

        $omisionEdadGrupoArbolMujer3 = $request->query('omisionEdadGrupoArbolMujer3');

        $omisionEdadGrupoArbolMujer4 = $request->query('omisionEdadGrupoArbolMujer4');

        $omisionEdadGrupoArbolMujer5 = $request->query('omisionEdadGrupoArbolMujer5');

        $omisionEdadGrupoArbolMujer6 = $request->query('omisionEdadGrupoArbolMujer6');

        $omisionEdadGrupoArbolMujer7 = $request->query('omisionEdadGrupoArbolMujer7');

        $omisionEdadGrupoArbolMujer8 = $request->query('omisionEdadGrupoArbolMujer8');

        $omisionEdadGrupoArbolMujer9 = $request->query('omisionEdadGrupoArbolMujer9');

        $omisionEdadGrupoArbolHombre1 = $request->query('omisionEdadGrupoArbolHombre1');

        $omisionEdadGrupoArbolHombre2 = $request->query('omisionEdadGrupoArbolHombre2');

        $omisionEdadGrupoArbolHombre3 = $request->query('omisionEdadGrupoArbolHombre3');

        $omisionEdadGrupoArbolHombre4 = $request->query('omisionEdadGrupoArbolHombre4');

        $omisionEdadGrupoArbolHombre5 = $request->query('omisionEdadGrupoArbolHombre5');

        $omisionEdadGrupoArbolHombre6 = $request->query('omisionEdadGrupoArbolHombre6');

        $omisionEdadGrupoArbolHombre7 = $request->query('omisionEdadGrupoArbolHombre7');

        $omisionEdadGrupoArbolHombre8 = $request->query('omisionEdadGrupoArbolHombre8');

        $omisionEdadGrupoArbolHombre9 = $request->query('omisionEdadGrupoArbolHombre9');



        // Servicios Publicos




        //Grupos Etnicos

        $percentageAfroColombiano =  $request->query('afrocolombiano');

        $percentageIndigena = $request->query('indigenas');

        $percentageRaizales = $request->query('raizales');

        $percentagePalenqueros = $request->query('palenqueros');

        $percentageGitanos = $request->query('gitanos');

        $percentageResto = $request->query('ningunoEtnico');


        
        // Servicios publicos

        $servicioPublicoElectricoPorcentaje = $request->query('servicioElectrico');


        $servicioPublicoAlcantarilladoPorcentaje = $request->query('servicioAlcantarillado');


        $servicioPublicoBasurasPorcentaje = $request->query('servicioBasuras');


        $servicioPublicoAcueductoPorcentaje = $request->query('servicioAcueducto');


        $servicioPublicoGasPorcentaje = $request->query('servicioGas');


        $servicioPublicoInternetPorcentaje = $request->query('servicioInternet');






        // Total Unidades Viviendas

        $totalUnidadesVivienda = $request->query('totalUnidadesVivienda');

        $totalUnidadesViviendaOcupadas = $request->query('totalUnidadesViviendaOcupadas');

        $totalResidencial = $request->query('totalResidencial');

        $totalNoResidencial = $request->query('totalNoResidencial');

        $totalMixto = $request->query('totalMixto');



        $otroPaisMujer = $request->query('otroPaisMujer');
        $otroPaisHombre = $request->query('otroPaisHombre');
        $otroMunicipioMujer = $request->query('otroMunicipioMujer');
        $otroMunicipioHombre = $request->query('otroMunicipioHombre');
        $esteMunicipioMujer = $request->query('esteMunicipioMujer');
        $esteMunicipioHombre = $request->query('esteMunicipioHombre');

        $totalHogaresParticulares = $request->query('totalHogaresParticulares');



        $omisionCabeceraPercentage;

        $omisionPobladoPercentage;

        $municipio = $configurations[0]->alcaldia;

        $departamento = $configurations[0]->departamento;


        // Total personas

        $totalPersonas1= $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas === 1;
        })->count();

        $totalPersonas1Porcentaje = $count > 0 ? round(($totalPersonas1 / $count) * 100, 2) : 0;

        $totalPersonas2= $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas === 2;
        })->count();

        $totalPersonas2Porcentaje = $count > 0 ? round(($totalPersonas2 / $count) * 100, 2) : 0;

        $totalPersonas3= $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas === 3;
        })->count();

        $totalPersonas3Porcentaje = $count > 0 ? round(($totalPersonas3 / $count) * 100, 2) : 0;

        $totalPersonas4= $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas === 4;
        })->count();

        $totalPersonas4Porcentaje = $count > 0 ? round(($totalPersonas4 / $count) * 100, 2) : 0;

        $totalPersonas5= $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas === 5;
        })->count();

        $totalPersonas5Porcentaje = $count > 0 ? round(($totalPersonas5 / $count) * 100, 2) : 0;

        $totalPersonas6 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->total_personas >= 6;
        })->count();

        $totalPersonas6Porcentaje = $count > 0 ? round(($totalPersonas6 / $count) * 100, 2) : 0;






        // Tipo vivienda

        
        $tipoViviendaCasa = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->tipo_vivienda === 'Casa';
        })->count();

        $tipoViviendaApartamento = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->tipo_vivienda === 'Apartamento';
        })->count();

        $tipoViviendaCuarto = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->tipo_vivienda === 'Cuarto';
        })->count();

        $tipoViviendaIndigena = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->tipo_vivienda === 'Vivienda Indígena';
        })->count();

        $tipoViviendaOtro = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->tipo_vivienda === 'Otro tipo de vivienda';
        })->count();


        // Asistencia escolar

        $caracterizacionEscolarHombreSiGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionEscolarMujerSiGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->actualmente_estudia === 1;
        })->count();

        $caracterizacionEscolarHombreSiGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionEscolarMujerSiGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->actualmente_estudia === 1;
        })->count();


        $caracterizacionEscolarHombreSiGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionEscolarMujerSiGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->actualmente_estudia === 1;
        })->count();




        // Leer y Escribir Grafica

        $caracterizacionLeerHombreSiGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerHombreNoGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();

        $caracterizacionLeerMujerSiGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerMujerNoGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 5 && $diligenciamiento->edad <= 14 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();


        $caracterizacionLeerHombreSiGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerHombreNoGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();

        $caracterizacionLeerMujerSiGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerMujerNoGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 15 && $diligenciamiento->edad <= 64 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();


        $caracterizacionLeerHombreSiGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerHombreNoGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Hombre' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();

        $caracterizacionLeerMujerSiGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 1;
        })->count();

        $caracterizacionLeerMujerNoGrupo3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 65 &&
                   $diligenciamiento->sexo === 'Mujer' && 
                   $diligenciamiento->sabe_leer_escribir === 0;
        })->count();



        // Grafica Lateral Centros Poblados y discapacidad

        $centrosPoblados = $diligenciamientos->pluck('centro_poblado')->unique()->values()->all();

        $caracterizacionDiscapacidadNulaPorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Ninguna de las anteriores');
        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });

        $caracterizacionDiscapacidadMultiplePorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Multiple');
        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });

        $caracterizacionDiscapacidadMotoraPorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Fisica');
        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });

        $caracterizacionDiscapacidadOrganicaPorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Sistémica');
        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });

        $caracterizacionDiscapacidadSensorialPorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Auditiva') 
            || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Afonía') 
            || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Visual');

        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });

        $caracterizacionDiscapacidadMentalPorCentroPoblado = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Psicosocial') 
            || str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Mental') 
            || str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Intelectual');

        })->groupBy('centro_poblado')->map(function ($grupo) {
            return $grupo->count();
        });


        

        








        $caracterizacionDiscapacidadNulaCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Ninguna de las anteriores');
        })->count();

        $caracterizacionDiscapacidadNula = $count > 0 ? round(($caracterizacionDiscapacidadNulaCount / $count) * 100, 2) : 0;


        $caracterizacionPluridiscapacidadCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Multiple');
        })->count();

        $caracterizacionPluridiscapacidad = $count > 0 ? round(($caracterizacionPluridiscapacidadCount / $count) * 100, 2) : 0;


        $caracterizacionDiscapacidadMotoraSensorialCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Fisica') && str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Auditiva') || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Afonía') || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Visual');
        })->count();

        $caracterizacionDiscapacidadMotoraSensorial = $count > 0 ? round(($caracterizacionDiscapacidadMotoraSensorialCount / $count) * 100, 2) : 0;



        $caracterizacionDiscapacidadOrganicaCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Sistémica');
        })->count();

        $caracterizacionDiscapacidadOrganica = $count > 0 ? round(($caracterizacionDiscapacidadOrganicaCount / $count) * 100, 2) : 0;


        $caracterizacionDiscapacidadSensorialCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Auditiva') || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Afonía') || str_contains($diligenciamiento->limitantes_permanentes, 'Discapacidad Visual');
        })->count();

        $caracterizacionDiscapacidadSensorial = $count > 0 ? round(($caracterizacionDiscapacidadSensorialCount / $count) * 100, 2) : 0;


        $caracterizacionDiscapacidadMentalCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Psicosocial') || str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Mental') || str_contains($diligenciamiento->limitantes_permanentes, 'Dispacidad Intelectual');
        })->count();

        $caracterizacionDiscapacidadMental = $count > 0 ? round(($caracterizacionDiscapacidadMentalCount / $count) * 100, 2) : 0;











        $caracterizacionGrupoArbolMujer1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 0 && $diligenciamiento->edad < 5 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 0 && $diligenciamiento->edad < 5 && $diligenciamiento->sexo === 'Hombre';
        })->count();



        $caracterizacionGrupoArbolMujer2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 10 && $diligenciamiento->edad < 15 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 10 && $diligenciamiento->edad < 15 && $diligenciamiento->sexo === 'Hombre';
        })->count();




        $caracterizacionGrupoArbolMujer3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 20 && $diligenciamiento->edad < 25 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre3 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 20 && $diligenciamiento->edad < 25 && $diligenciamiento->sexo === 'Hombre';
        })->count();




        $caracterizacionGrupoArbolMujer4 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 30 && $diligenciamiento->edad < 35 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre4 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 30 && $diligenciamiento->edad < 35 && $diligenciamiento->sexo === 'Hombre';
        })->count();




        $caracterizacionGrupoArbolMujer5 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 40 && $diligenciamiento->edad < 45 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre5 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 40 && $diligenciamiento->edad < 45 && $diligenciamiento->sexo === 'Hombre';
        })->count();




        $caracterizacionGrupoArbolMujer6 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 50 && $diligenciamiento->edad < 55 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre6 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 50 && $diligenciamiento->edad < 55 && $diligenciamiento->sexo === 'Hombre';
        })->count();




        $caracterizacionGrupoArbolMujer7 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 60 && $diligenciamiento->edad < 65 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre7 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 60 && $diligenciamiento->edad < 65 && $diligenciamiento->sexo === 'Hombre';
        })->count();





        $caracterizacionGrupoArbolMujer8 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 70 && $diligenciamiento->edad < 75 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre8 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad >= 70 && $diligenciamiento->edad < 75 && $diligenciamiento->sexo === 'Hombre';
        })->count();





        $caracterizacionGrupoArbolMujer9 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 79 && $diligenciamiento->sexo === 'Mujer';
        })->count();

        $caracterizacionGrupoArbolHombre9 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 79 &&  $diligenciamiento->sexo === 'Hombre';
        })->count();



        if ($omision > 0) { 
            $omisionCabeceraPercentage = round(($omisionCabecera * 100) / $omision, 2);
        } else {
            $omisionCabeceraPercentage = 0; 
        }
        
        if ($omision > 0) { 
            $omisionPobladoPercentage = round(($omisionPoblado * 100) / $omision, 2);
        } else {
            $omisionPobladoPercentage = 0; 
        }
        


        $caracterizacionGrupo1 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad < 14;
        })->count();

        $caracterizacionGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 14 && $diligenciamiento->edad < 60;
        })->count();

        $caracterizacionGrupo3 = $caracterizacionGrupo2 = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->edad > 59;
        })->count();




        $womenCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->sexo === 'Mujer';
        })->count();

        $menCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->sexo === 'Hombre';
        })->count();


        
        $percentageNoAutoreconocimiento = round(($noAutoreconocimiento / $count) * 100, 2);


        return view('aux_report', compact(
        'municipio',
        'departamento',
        'count', 
        'womenCount',
        'menCount', 
        'noAutoreconocimiento',
        'percentageNoAutoreconocimiento',
        'percentageAfroColombiano',
        'percentageIndigena' , 
        'percentageGitanos', 
        'percentageResto', 
        'percentagePalenqueros',
        'omisionEdadGrupo1',
        'omisionEdadGrupo2',
        'omisionEdadGrupo3', 
        'caracterizacionGrupoArbolMujer1',
        'caracterizacionGrupoArbolHombre1',
        'caracterizacionGrupoArbolMujer2',
        'caracterizacionGrupoArbolHombre2',
        'caracterizacionGrupoArbolMujer3',
        'caracterizacionGrupoArbolHombre3',
        'caracterizacionGrupoArbolMujer4',
        'caracterizacionGrupoArbolHombre4',
        'caracterizacionGrupoArbolMujer5',
        'caracterizacionGrupoArbolHombre5',
        'caracterizacionGrupoArbolMujer6',
        'caracterizacionGrupoArbolHombre6',
        'caracterizacionGrupoArbolMujer7',
        'caracterizacionGrupoArbolHombre7',
        'caracterizacionGrupoArbolMujer8',
        'caracterizacionGrupoArbolHombre8',
        'caracterizacionGrupoArbolMujer9',
        'caracterizacionGrupoArbolHombre9',
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
        'caracterizacionDiscapacidadNula',
        'caracterizacionPluridiscapacidad',
        'caracterizacionDiscapacidadMotoraSensorial',
        'caracterizacionDiscapacidadOrganica',
        'caracterizacionDiscapacidadSensorial',
        'caracterizacionDiscapacidadMental',
        'centrosPoblados',
        'caracterizacionDiscapacidadNulaPorCentroPoblado',
        'caracterizacionDiscapacidadMultiplePorCentroPoblado',
        'caracterizacionDiscapacidadMotoraPorCentroPoblado',
        'caracterizacionDiscapacidadOrganicaPorCentroPoblado',
        'caracterizacionDiscapacidadSensorialPorCentroPoblado',
        'caracterizacionDiscapacidadMentalPorCentroPoblado',
        'caracterizacionLeerHombreSiGrupo1',
        'caracterizacionLeerHombreNoGrupo1',
        'caracterizacionLeerMujerSiGrupo1',
        'caracterizacionLeerMujerNoGrupo1',
        'caracterizacionLeerHombreSiGrupo2',
        'caracterizacionLeerHombreNoGrupo2',
        'caracterizacionLeerMujerSiGrupo2',
        'caracterizacionLeerMujerNoGrupo2',
        'caracterizacionLeerHombreSiGrupo3',
        'caracterizacionLeerHombreNoGrupo3',
        'caracterizacionLeerMujerSiGrupo3',
        'caracterizacionLeerMujerNoGrupo3',
        'caracterizacionEscolarHombreSiGrupo1',
        'caracterizacionEscolarMujerSiGrupo1',
        'caracterizacionEscolarHombreSiGrupo2',
        'caracterizacionEscolarMujerSiGrupo2',
        'caracterizacionEscolarHombreSiGrupo3',
        'caracterizacionEscolarMujerSiGrupo3',
        'totalUnidadesVivienda',
        'totalUnidadesViviendaOcupadas',
        'totalResidencial',
        'totalNoResidencial',
        'totalMixto',
        'tipoViviendaCasa',
        'tipoViviendaApartamento',
        'tipoViviendaCuarto',
        'tipoViviendaIndigena',
        'tipoViviendaOtro',
        'servicioPublicoElectricoPorcentaje',
        'servicioPublicoBasurasPorcentaje',
        'servicioPublicoAcueductoPorcentaje',
        'servicioPublicoAlcantarilladoPorcentaje',
        'servicioPublicoGasPorcentaje',
        'servicioPublicoInternetPorcentaje',
        'totalPersonas1Porcentaje',
        'totalPersonas2Porcentaje',
        'totalPersonas3Porcentaje',
        'totalPersonas4Porcentaje',
        'totalPersonas5Porcentaje',
        'totalPersonas6Porcentaje',
        'otroPaisMujer',
        'otroPaisHombre',
        'otroMunicipioMujer',
        'otroMunicipioHombre',
        'esteMunicipioMujer',
        'esteMunicipioHombre',
        'totalHogaresParticulares',
        'caracterizacionGrupo1',
        'caracterizacionGrupo2',
        'caracterizacionGrupo3',
        'percentageRaizales',
        'diligenciamientos', 
        'omisionPorcentaje',
        'omision',
        'omisionPoblado',
        'omisionPobladoPercentage',
        'omisionCabecera',
        'omisionCabeceraPercentage'));

    }




}