<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CategoriesPeriodsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PeriodsController;
use App\Http\Controllers\UsersController;

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
/*==========Categories-periods Routes======== */
Route::get('/categories-periods',[CategoriesPeriodsController::class,'index'])->name('categories-periods.index');

/*==========Categories Routes======== */
Route::group(['prefix' => '/categories'],function(){
    Route::get('/create',[CategoriesController::class,'create'])->name('category.create');
    Route::post('/store',[CategoriesController::class,'store'])->name('category.store');
    Route::get('/edit/{id}',[CategoriesController::class,'edit'])->name('category.edit');
    Route::post('/update/{id}',[CategoriesController::class,'update'])->name('category.update');
    Route::get('/delete/{id}',[CategoriesController::class,'delete'])->name('category.delete');
});
/*==========Periods Routes======== */
Route::group(['prefix' => '/periods'],function(){
    Route::get('/create',[PeriodsController::class,'create'])->name('period.create');
    Route::post('/store',[PeriodsController::class,'store'])->name('period.store');
    Route::get('/edit/{id}',[PeriodsController::class,'edit'])->name('period.edit');
    Route::post('/update/{id}',[PeriodsController::class,'update'])->name('period.update');
    Route::get('/delete/{id}',[PeriodsController::class,'delete'])->name('period.delete');
});
/*==========Users Routes======== */
Route::group(['prefix' => '/users'],function(){
    Route::get('/',[UsersController::class,'index'])->name('user.index');
    Route::get('/create',[UsersController::class,'create'])->name('user.create');
    Route::post('/store',[UsersController::class,'store'])->name('user.store');
    Route::get('/edit/{id}',[UsersController::class,'edit'])->name('user.edit');
    Route::post('/update/{id}',[UsersController::class,'update'])->name('user.update');
    Route::get('/delete/{id}',[UsersController::class,'delete'])->name('user.delete');
});