<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChartJSController;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//for the pdf
Route::get('chart', [ChartJSController::class, 'index']);
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);

//for the chart
// Route::get('chart', [ChartController::class, "index"]);

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');

Route::resource('books', \App\Http\Controllers\BookController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');
