<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\FallBackControler;


Route::get('/dash', function () {
    return view('welcome');
});


//rotas home
Route::get('/', [HomeControler::class, 'index'])->name('home');

//rota fallback
Route::fallback([FallBackControler::class, 'notFound']);

//rotas paginas bandas
Route::get('/show-bands', [BandsController::class, 'allbands'])->name('bands.show_all');

Route::get('/show-one-bands/{id}', [BandsController::class, 'onebands'])->name('bands.show_one');

Route::get('/delete-bans/{id}', [BandsController::class, 'deletebands'] )->name('bands.delete');
