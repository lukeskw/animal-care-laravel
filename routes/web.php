<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GeraProcedimentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\ProdutoController;

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::fallback(function () {
    return view('errors/404');
});

Route::get('/', function () {
    return view('home');
});

require __DIR__.'/auth.php';


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::resource('/clientes', ClienteController::class)->name('clientes','*');

    Route::resource('/animais', AnimalController::class)->name('animals','*');

    Route::resource('/produtos', ProdutoController::class)->name('produtos','*');

    Route::resource('/procedimentos', ProcedimentoController::class)->name('procedimentos','*');

    Route::resource('/gera-procedimento', GeraProcedimentoController::class)->name('gera-procedimento','*');

    Route::get('/generate-pdf/{type}', [PdfController::class, 'generate'])->name('generate-pdf');
});


