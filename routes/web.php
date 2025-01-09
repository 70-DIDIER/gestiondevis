<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiverController;
use App\Http\Controllers\FactureController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('factures/pdf', [FactureController::class, 'generatePDF'])->name('factures.pdf');
Route::resource('factures', FactureController::class);
Route::resource('divers', DiverController::class);
Route::get('/factures/create/{diver_id}', [FactureController::class, 'create'])->name('factures.create');
Route::post('/factures', [FactureController::class, 'store'])->name('factures.store');
// Route::get('factures/pdf', [FactureController::class, 'generatePDF'])->name('factures.pdf');