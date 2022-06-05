<?php

use App\Http\Controllers\Crud;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
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



Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
    Route::get('/dashboard', [Crud::class, 'index'])->name('dashboard');
});

//For guess
Route::get('/', [ItemController::class, 'index'])->name('index');
Route::get('/info', [ItemController::class, 'info'])->name('info');



//After logined
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    $c = 'App\Http\Controllers\\';

    Route::post('/add', [Crud::class, 'add'])->name('add');
    Route::get('/edit', [Crud::class, 'edit'])->name('edit');
    Route::get('/delete', [Crud::class, 'delete'])->name('delete');
    Route::post('/uptade', [Crud::class, 'uptade'])->name('uptade');

    //for admin
    Route::middleware(['admin'])->group(function(){
        $c = 'App\Http\Controllers\\';

    });
});
