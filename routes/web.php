<?php

use App\Http\Controllers\PaypalController;
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

Route::get('/', function () {
    return view('welcome');
})->name('createpaypal');


Route::get('processPaypal',[PaypalController::class,'processPaypal'])->name('processPaypal');
Route::get('processSuccess',[PaypalController::class,'processSuccess'])->name('processSuccess');
Route::get('processCancel',[PaypalController::class,'processCancel'])->name('processCancel');