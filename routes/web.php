<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoneytrackerappController;
use App\Http\Controllers\Showalllist;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [MoneytrackerappController::class,'index'])->middleware(['auth'])->name('index');
Route::post('/',[MoneytrackerappController::class,'store'])->middleware(['auth'])->name('store');
Route::delete('/{moneytrackerapp:id}',[MoneytrackerappController::class,'destroy'])->middleware(['auth'])->name('destroy');

Route::get('/showalllist',[Showalllist::class,'index'])->name('showallist');

require __DIR__.'/auth.php';
