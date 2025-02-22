<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\FallBackControler;
use App\Http\Controllers\DashboardController;

//so para ter acesso a dash do laravel
Route::get('/dash', function () {
    return view('welcome');
})->name('dash');


//rotas home
Route::get('/', [HomeControler::class, 'index'])->name('home');

//rota fallback
Route::fallback([FallBackControler::class, 'notFound']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.show')->middleware('auth');


//rotas paginas bandas
Route::get('/show-bands', [BandsController::class, 'allbands'])->name('bands.show_all');

Route::get('/delete-bands/{id}', [BandsController::class, 'deletebands'] )->name('bands.delete');

Route::post('/create-bands', [BandsController::class, 'createbands'])->name('bands.create');

Route::get('/edit-bands/{id}', [BandsController::class, 'getInfoForEdit'])->name('bands.edit');

//rotas para albuns
Route::get('/show-one-band-album/{id}', [AlbunsController::class, 'onebands'])->name('bands.show_one');

Route::post('/create-albuns', [AlbunsController::class, 'createalbuns'])->name('albuns.create');

Route::get('/delete-albuns/{id}', [AlbunsController::class, 'deletealbuns'] )->name('albuns.delete');

Route::get('/edit-albuns/{id}', [AlbunsController::class, 'getInfoForEditAlbuns'])->name('albuns.edit');

Route::get('/show-all-albuns', [AlbunsController::class, 'index'])->name('albuns.show_all');

//para utilizadores
Route::get('/add-users', [UserControler::class, 'addUser'] )->name('users.add');

Route::post('/create-users', [UserControler::class, 'createUser'] )->name('users.create');

Route::get('/delete-user/{id}', [UserControler::class, 'deleteUser'] )->name('users.delete');

Route::get('/edit-user/{id}', [UserControler::class, 'editUser'])->name('users.edit');
