<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\AlbunsController;
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

Route::get('/delete-bands/{id}', [BandsController::class, 'deletebands'] )->name('bands.delete');

Route::post('/create-bands', [BandsController::class, 'createbands'])->name('bands.create');

Route::get('/edit-bands/{id}', [BandsController::class, 'getInfoForEdit'])->name('bands.edit');

//rotas para albuns
Route::post('/create-albuns', [AlbunsController::class, 'createalbuns'])->name('albuns.create');

Route::get('/delete-albuns/{id}', [AlbunsController::class, 'deletealbuns'] )->name('albuns.delete');

Route::get('/edit-albuns/{id}', [AlbunsController::class, 'getInfoForEditAlbuns'])->name('albuns.edit');


