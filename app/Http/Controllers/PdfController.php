<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}