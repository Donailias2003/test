<?php

use App\Http\Controllers\portsController;
use App\Http\Controllers\RisultatiController;
use App\Http\Controllers\GestioneTvController;
use Illuminate\Support\Facades\Route;
// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    //Route::crud('torneo', 'TorneoCrudController');
    Route::group(['middleware' => ['can:Visualizza partite']], function () {
        Route::crud('partita', 'PartitaCrudController');
    });
    Route::group(['middleware' => ['can:Visualizza tornei']], function () {
        Route::crud('torneo', 'TorneoCrudController');
    });
    Route::group(['middleware' => ['can:Impostazioni server']], function () {
        Route::get('porte',[portsController::class, 'index']);
        Route::get('startstop/{id}',[portsController::class, 'startStopServer']);
    });
    Route::group(['middleware' => ['can:Gestione TV']], function () {
        Route::get('tvmanager',[GestioneTvController::class, 'index']);
        Route::post('tvmanager/play',[GestioneTvController::class, 'play']);
    });
    Route::group(['middleware' => ['can:Gestisci risultati']], function () {
        Route::get('risultati',[RisultatiController::class, 'index']);
        Route::post('risultati',[RisultatiController::class, 'updateResults']);
        Route::get('risultati/termina/{id}',[RisultatiController::class, 'endPartita']);
    });
    Route::group(['middleware' => ['can:Visualizza giocatori']], function () {
        Route::crud('giocatori', 'GiocatoriCrudController');
    });
}); // this should be the absolute last line of this file