<?php

// use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
Route::middleware(['multi_domain'])->group(function () {
    Route::any('/', function () {
        // return view('welcome');
        return redirect('/home');
    });

    Route::get('storage/app/{filename}', function ($filename) {
        $path = storage_path('app/public/' . $filename);
    
        if (!File::exists($path)) {
            abort(404);
        }
    
        $file = File::get($path);
        $type = File::mimeType($path);
    
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
    
        return $response;
    });
    
    // Route::get('/', "indexController");
    Route::middleware(['auth'])->group(function () {
        Route::resource('bio', BioController::class);
        // use App\Http\Controllers\InPhotoController;
        Route::resource('portfolio', PortfolioController::class);
        Route::resource('skill', SkillController::class);
    });
    
    // https://laravel.com/docs/8.x/routing
    // Route::match(
    //     ['post', 'get'],
    //     'pages/{english_name}',
    //     [App\Http\Controllers\PagesController::class, 'index']
    // );
    Route::any('pages/{english_name}',
        [App\Http\Controllers\PagesController::class, 'index']
    );
    
    Auth::routes(['register' => true]);
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});


