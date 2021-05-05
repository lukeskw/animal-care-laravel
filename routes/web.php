<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\GeraProcedimentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProcedimentoController;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return redirect('https://www.taticaweb.com.br/site/cirac/index.php');
})->name('home');

Route::fallback(function () {
    return view('errors/404');
});

Route::get('/generate-pdf/{type}', [PdfController::class, 'generate'])->middleware('auth')->name('generate-pdf');

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('layouts/dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/dashboard', 'HomeController@index')->name('dashboard')->middleware(['auth']);
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware(['auth']);


Route::resource('/clientes', ClienteController::class)->name('clientes','*')->middleware(['auth']);

Route::resource('/animais', AnimalController::class)->name('animais','*')->middleware(['auth']);

Route::resource('/produtos', ProdutoController::class)->name('produtos','*')->middleware(['auth']);

Route::resource('/procedimentos', ProcedimentoController::class)->name('procedimentos','*')->middleware(['auth']);

Route::resource('/gera-procedimento', GeraProcedimentoController::class)->name('gera-procedimento','*')->middleware(['auth']);

