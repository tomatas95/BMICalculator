<?php

use App\Http\Controllers\BMIController;
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

// Route::get('/', [BMIController::class, 'index']);

Route::get('/', function(){
    return view('index');
});

Route::post('/', [BMIController::class, 'store'])->name('bmi.store');