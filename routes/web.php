<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

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
    if(Auth::guest()){
        return Redirect::to('/login');
    }
    if(Auth::check()){
        return Redirect::to('/home');
    }
});

Auth::routes();
Route::get('logout',[App\Http\Controllers\Auth\LoginController::class,'logout']);

Route::post('auth/get_zones',[App\Http\Controllers\Auth\RegisterController::class,'get_zones']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*==========Company Routes======== */
Route::group(['prefix' =>'/companies'],function(){
    Route::get('/',[CompaniesController::class,'index'])->name('company.index');
    Route::get('/create',[CompaniesController::class,'create'])->name('company.create');
    Route::post('/store',[CompaniesController::class,'store'])->name('company.store');
    Route::get('/active/{id}',[CompaniesController::class,'active'])->name('company.active');
    Route::get('/active',[CompaniesController::class,'active'])->name('company.active');

});
