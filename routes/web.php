<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::prefix('owner') ->middleware('can:owner-higher')->group(function(){
    Route::resource('menus', MenuController::class);
});

Route::prefix('user') ->middleware('can:user-higher')->group(function(){
    Route::get('index', function () { 
        
    }); 
});
