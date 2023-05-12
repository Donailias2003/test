<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;
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

Route::get('/',[Controllers\WelcomeController::class, 'index']);
Route::get('/api/partite',[Controllers\TvController::class, 'apiPartite']);
Route::get('/api/marcatori',[Controllers\TvController::class, 'apiMarcatori']);
Route::get('/api/votazioni',[Controllers\TvController::class, 'apiVotazioni']);
Route::get('/votazioni', [Controllers\VotazioniController::class, 'index']);
Route::get('/rivota', [Controllers\VotazioniController::class, 'revote']);
Route::get('/vota/{id}', [Controllers\VotazioniController::class, 'votaGiocatore']);
Route::get('/tv', [Controllers\TvController::class, 'index']);
Route::post('tv/login', [Controllers\TvController::class, 'connectTv']);
Route::get('tv/disconnect', [Controllers\TvController::class, 'disconnectTv']);