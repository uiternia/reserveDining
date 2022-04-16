<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Models\Reservation;

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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::prefix('admin') ->middleware('can:admin-higher')->group(function(){
   Route::get('/',[AdminController::class,'index'])->name('admin.index');
   Route::get('/{id}',[AdminController::class,'show'])->name('admin.show');
});

Route::prefix('owner') ->middleware('can:owner-higher')->group(function(){
    Route::resource('menus', MenuController::class);
});

Route::middleware('can:user-higher')->group(function(){
   Route::get('/dashboard',[ReservationController::class,'dashboard'])->name('dashboard');
   Route::get('/order',[OrderController::class,'index'])->name('order.index');
   Route::get('/order/{id}',[OrderController::class,'show'])->name('order.show');
   Route::post('/order/{id}',[OrderController::class,'cancel'])->name('order.cancel');
   Route::get('/{id}',[ReservationController::class,'detail'])->name('menus.detail');
   Route::get('/ticket/{id}',[ReservationController::class,'ticket'])->name('menus.ticket');
   Route::post('/{id}',[ReservationController::class,'reserve'])->name('menus.reserve');
});
