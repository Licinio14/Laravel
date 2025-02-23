<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatControler;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\BandsController;
use App\Http\Controllers\AlbunsController;
use App\Http\Controllers\FallBackControler;
use App\Http\Controllers\DashboardController;


//rotas home
Route::get('/', [HomeControler::class, 'index'])->name('home');

//rota fallback
Route::fallback([FallBackControler::class, 'notFound']);

//dashboard
Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.show')->middleware('auth');


//rotas paginas bandas
Route::get('/show-bands', [BandsController::class, 'allbands'])->name('bands.show_all');

Route::get('/delete-bands/{id}', [BandsController::class, 'deletebands'] )->name('bands.delete')->middleware(['auth', 'admin']);

Route::post('/create-bands', [BandsController::class, 'createbands'])->name('bands.create')->middleware(['auth', 'admin']);

Route::get('/edit-bands/{id}', [BandsController::class, 'getInfoForEdit'])->name('bands.edit')->middleware('auth');

//rotas para albuns
Route::get('/show-one-band-album/{id}', [AlbunsController::class, 'onebands'])->name('bands.show_one');

Route::post('/create-albuns', [AlbunsController::class, 'createalbuns'])->name('albuns.create')->middleware(['auth', 'admin']);

Route::get('/delete-albuns/{id}', [AlbunsController::class, 'deletealbuns'] )->name('albuns.delete')->middleware(['auth', 'admin']);

Route::get('/edit-albuns/{id}', [AlbunsController::class, 'getInfoForEditAlbuns'])->name('albuns.edit')->middleware('auth');

Route::get('/show-all-albuns', [AlbunsController::class, 'index'])->name('albuns.show_all');

//para utilizadores
Route::get('/add-users', [UserControler::class, 'addUser'] )->name('users.add');

Route::post('/create-users', [UserControler::class, 'createUser'] )->name('users.create')->middleware(['auth', 'admin']);

Route::get('/delete-user/{id}', [UserControler::class, 'deleteUser'] )->name('users.delete')->middleware(['auth', 'admin']);

Route::get('/edit-user/{id}', [UserControler::class, 'editUser'])->name('users.edit')->middleware('auth');

//para o chat
Route::get('/chat', [ChatControler::class, 'index'] )->name('chat.show')->middleware('auth');

Route::post('/create-chat', [ChatControler::class, 'createChat'] )->name('chat.create')->middleware('auth');

Route::get('/delete-chat/{id}', [ChatControler::class, 'deleteChat'] )->name('chat.delete')->middleware(['auth', 'admin']);
