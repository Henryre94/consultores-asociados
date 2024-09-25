<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ConfigurationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/pdf-view', function(){
    return view('pdf_view');
});

Route::get('/report-view', function(){
    return view('report_view');
});

Route::get('/generate-pdf/{diligenciamiento}/{configuration}',[PdfController::class, 'generatePdf'])->name('generate-pdf');

Route::get('/generate-report',[PdfController::class, 'generateReport'])->name('generate-report');
