<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

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
    return view('layouts');
});

Route::get('/listGame' , [GameController::class , 'index'])->name('list');
Route::get('/addGame' , [GameController::class , 'add'])->name('add');
Route::post('/addGame' , [GameController::class , 'store'])->name('addlist');
Route::get('/edit/{game}' , [GameController::class , 'edit'])->name('edit');
Route::put('/edit/{game}' , [GameController::class , 'update'])->name('update');
// xoa theo id 
Route::delete('/delete/{game}' ,[GameController::class , 'delete'])->name('delete');

