<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Diligenciamiento;

class PdfController extends Controller
{
    public function generatePdf(Diligenciamiento $diligenciamiento)
    {
        $pdf = Pdf::loadView('pdf_view',compact('diligenciamiento'));
        return $pdf->download();
    }
}