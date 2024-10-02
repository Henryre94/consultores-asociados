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


        $diligenciamientos = Diligenciamiento::query()->get();

        $count = count($diligenciamientos);

        $omision = $request->query('omision');

        $omisionCabecera = $request->query('omisionCabecera');

        $omisionPoblado = $request->query('omisionPoblado');

        $omisionCabeceraPercentage;

        $omisionPobladoPercentage;


        if ($omision > 0) { 
            $omisionCabeceraPercentage = ($omisionCabecera * 100) / $omision;
        } else {
            $omisionCabeceraPercentage = 0; 
        }

        if ($omision > 0) { 
            $omisionPobladoPercentage = ($omisionPoblado * 100) / $omision;
        } else {
            $omisionPobladoPercentage = 0; 
        }




        $womenCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->sexo === 'Mujer';
        })->count();

        $menCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->sexo === 'Hombre';
        })->count();





        $afroColombianoCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->grupo_vulnerable === 'Afrocolombiano';
        })->count();

        $percentageAfroColombiano = $count > 0 ? ($afroColombianoCount / $count) * 100 : 0;

        $percentageAfroColombiano = round($percentageAfroColombiano, 2);



        $indigenasCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->grupo_vulnerable === 'Indígenas';
        })->count();

        $percentageIndigena = $count > 0 ? ($indigenasCount / $count) * 100 : 0;

        $percentageIndigena = round($percentageIndigena, 2);


        
        $raizalesCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->grupo_vulnerable === 'Raizales';
        })->count();

        $percentageRaizales = $count > 0 ? ($raizalesCount / $count) * 100 : 0;

        $percentageRaizales = round($percentageRaizales, 2);



        $palenquerosCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->grupo_vulnerable === 'Palenqueros';
        })->count();

        $percentagePalenqueros = $count > 0 ? ($palenquerosCount / $count) * 100 : 0;

        $percentageRaizales = round($percentagePalenqueros, 2);


        $gitanosCount = $diligenciamientos->filter(function ($diligenciamiento) {
            return $diligenciamiento->grupo_vulnerable === 'ROM(Gitanos)';
        })->count();

        $percentageGitanos = $count > 0 ? ($gitanosCount / $count) * 100 : 0;

        $percentageGitanos = round($percentageGitanos, 2);




        // Sumar los conteos de los grupos ya calculados
        $totalGruposVulnerables = $afroColombianoCount + $indigenasCount + $raizalesCount + $palenquerosCount + $gitanosCount;
        
        $restoCount = $count - $totalGruposVulnerables;

        $percentageResto = $count > 0 ? ($restoCount / $count) * 100 : 0;

        $percentageResto = round($percentageResto, 2);





        $pdf = PDF::loadView('report_view', 
        compact(
            'count', 
            'womenCount', 
            'menCount', 
            'percentageAfroColombiano',
            'percentageIndigena' , 
            'percentageGitanos', 
            'percentageResto', 
            'percentagePalenqueros', 
            'percentageRaizales',
            'diligenciamientos', 
            'omision',
            'omisionPoblado',
            'omisionPobladoPercentage',
            'omisionCabecera',
            'omisionCabeceraPercentage'
            ))
        ->setPaper('A3', 'portrait');
        return $pdf->stream();

    }

}