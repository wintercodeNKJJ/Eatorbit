<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use Illuminate\Auth\AuthManager;
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



Route::get('/',function(){
    return view('orbitPages.homePage');
})->middleware('auth.client');


//Verification route
Route::post('/verify',[PageController::class, 'verify'] )->name('verify');

//Cliebt login rout
Route::get('/login/client/verify', [AuthClientController::class,'clientLogin'])->name('clientLogin');

Route::get('/login/manager', [AuthManagerController::class, 'login']);
Route::get('logout', [LoginController::class,'logout']);

Route::name('door.')->group( function(){
    Route::get('/login/client',[AuthClientController::class, 'login'])->name('login');
    Route::get('/registering',[PageController::class, 'register'])->name('resgister');
    Route::get('/register',[PageController::class, 'toregister'])->name('toresgister');
});


Route::middleware('auth.client')->name('home.')->group(function(){
    Route::get('/home',[PageController::class, 'home'] )->name('home');
    Route::get('/dishes',[PageController::class, 'dishes'] )->name('dishes');
    Route::get('/logout',[PageController::class, 'logout'] )->name('logout');
    Route::get('/profile',[PageController::class, 'profile'] )->name('profile');
    Route::get('/restaurant',[PageController::class, 'restaurant'] )->name('restaurant');
    Route::get('/reserve',[PageController::class, 'reserve'] )->name('reserve');
    Route::get('/restaurant_list',[PageController::class, 'resList'] )->name('resList');
    Route::get('/command',[PageController::class, 'command'] )->name('command');
    Route::post('/commanded',[PageController::class, 'storingCommand'] )->name('storCommand');
    Route::post('/Reserved',[PageController::class, 'storingReserve'] )->name('storReserve');
    Route::get('/menu',[PageController::class, 'menu'] )->name('menu');
    Route::delete('/delete_Reservation',[PageController::class, 'deletReservation'] )->name('deletRes');
    Route::delete('/delete_Command',[PageController::class, 'deletCommand'] )->name('deletCom');
});


Route::name('manager.')->group(function () {
    //Route::view('/admin', 'admin');
});

// Route::prefix('info')->name('info.')->group(function(){
//     Route::get('/buy',[ClientController::class, 'buy'] )->name('buy');
//     Route::get('/index',[ClientController::class, 'index'] )->name('index');
//     Route::get('/clients',[ClientController::class, 'clients'] )->name('clients');
//     Route::get('/menu',[ClientController::class, 'menu'] )->name('menu');
//     Route::get('/manager',[ClientController::class, 'manager'] )->name('manager');
//     Route::get('/modify',[ClientController::class, 'modify'] )->name('modify');
//     Route::post('/stor',[ClientController::class, 'stor'] )->name('stor');
//     Route::get('/viewimage',[ClientController::class, 'viewimage'] )->name('viewimage');
// });
Auth::routes();