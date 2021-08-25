<?php

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
});

// Route::get('/', "indexController");

// use App\Http\Controllers\InPhotoController;
Route::resource('bio', BioController::class);

Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
