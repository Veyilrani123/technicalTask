<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HospitalController;

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

Route::group(['middleware'=>'CustomAuth'],function(){
    Route::get('/login',[HospitalController::class, 'login'])->name('login');
    Route::get('/doctors',[HospitalController::class, 'doctors'])->name('doctors');
    Route::get('/favoites',[HospitalController::class, 'favoites'])->name('favourites');
    Route::post('/favorite/{id}', [HospitalController::class, 'statusUpdate'])->name('statusUpdate');
});
Route::post('/login',[HospitalController::class, 'loginPost'])->name('loginPost');
Route::get('/logout',[HospitalController::class, 'logout'])->name('logout');

Route::get('/',[HospitalController::class, 'home'])->name('home');
