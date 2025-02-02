<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeControler;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\GiftsControler;
use App\Http\Controllers\TasksControler;
use App\Http\Controllers\FallBackControler;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeControler::class, 'index']);

Route::get('/home', [HomeControler::class, 'index'])->name('home');

Route::get('/users', [UserControler::class, 'allUser'])->name('users.show');

Route::get('/hello/{name}', [UserControler::class, 'nameUser'] )->name('hello.name');

Route::fallback([FallBackControler::class, 'notFound']);

Route::get('/add-users', [UserControler::class, 'addUser'] )->name('users.add');

Route::get('/all-tasks', [TasksControler::class, 'allTasks'] )->name('tasks.all');

Route::get('/showall-tasks', [TasksControler::class, 'showAllTasks'] )->name('tasks.showAll');

Route::get('/showall-gifts', [GiftsControler::class, 'showAllGifts'] )->name('gifts.all');

Route::get('/showinfo-gifts/{id}', [GiftsControler::class, 'showInfoGifts'] )->name('gifts.info');

Route::get('/delete-gifts/{id}', [GiftsControler::class, 'deleteGifts'] )->name('gifts.delete');

Route::get('/users/{id}', [UserControler::class, 'showOneUser'] )->name('users.showone');

Route::get('/users-delete/{id}', [UserControler::class, 'deletUserAtDB'] )->name('users.deleteOne');

Route::get('/showone-tasks/{id}', [TasksControler::class, 'showOneTasks'] )->name('tasks.showone');

Route::get('/tasks-delete/{id}', [TasksControler::class, 'deleteOneTasks'] )->name('tasks.deleteone');

Route::post('/create-user', [UserControler::class, 'createUser'])->name('users.create');

Route::get('/tasks-add', [TasksControler::class, 'addTasks'])->name('tasks.add');

Route::post('/create-tasks', [TasksControler::class, 'createTasks'])->name('tasks.create');

Route::get('/update-users/{id}', [UserControler::class, 'updateUser'] )->name('users.update');

Route::post('/update-user', [UserControler::class, 'updateUserInfo'])->name('users.updateInfo');

Route::post('/create-gifts', [GiftsControler::class, 'createGifts'])->name('gifts.create');

Route::get('/update-gifts/{id}', [GiftsControler::class, 'updateGifts'] )->name('gifts.update');

Route::post('/update-gifts', [GiftsControler::class, 'updateGiftInfo'])->name('gifts.updateGift');
