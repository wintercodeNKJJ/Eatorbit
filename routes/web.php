<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use App\Models\Client;
use App\Models\Meal;
use App\Models\Restaurant;
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
        return redirect()->route('home.home');
})->middleware('auth.client','auth.manager');


//client and manager login selection Verification route
Route::post('/verify',[PageController::class, 'verify'] )->name('verify');

//client and manager Register selection Verification route
Route::post('/verifyRegister',[PageController::class, 'verifyRegister'] )->name('verifyRegister');

/**
 * Client login route
 */
Route::get('/login/client/verify', [AuthClientController::class,'clientLogin'])->name('clientLogin');


//Client logout route
Route::get('/logout/client', [AuthClientController::class,'clientlogout'])->name('clientlogout');



Route::name('door.')->group( function(){
    Route::get('/login/client',[AuthClientController::class, 'login'])->name('login');
    Route::get('/registering',[PageController::class, 'register'])->name('resgister');
    Route::get('/register',[PageController::class, 'toregister'])->name('toresgister');
});


Route::middleware('auth.client')->name('home.')->group(function(){
    Route::get('/home',[PageController::class, 'home'] )->name('home');
    Route::get('/dishes',[PageController::class, 'dishes'] )->name('dishes');
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


///////////////////////////////////////////////////////////////////////

//Manager login route
Route::get('/login/manager/verify', [AuthManagerController::class,'managerLogin'])->name('managerLogin');

//Client logout route
Route::get('/logout/manager', [AuthManagerController::class,'managerlogout'])->name('managerlogout');

//middleware('auth.manager')

Route::middleware('auth.manager')->name('manager.')->group(function () {
    Route::get('/Mhome',[PageController::class, 'managerhome'] )->name('home');
    Route::post('/reserves',[PageController::class, 'reserves'] )->name('reserves');
    Route::post('/retaurantMenu',[PageController::class, 'restaurantmenu'] )->name('menu');
    Route::post('/restaurantEdit',[PageController::class, 'restauranredit'] )->name('edit');
    Route::post('/restaurantDelet',[PageController::class, 'restaurantdelet'] )->name('delet');
    Route::post('/restaurantAdd',[PageController::class, 'addRestaurant'] )->name('addr');
    Route::post('/restaurantEditdish',[PageController::class, 'restauranreditdish'] )->name('editdish');
    Route::post('/restaurantDeletdish',[PageController::class, 'restaurantdeletdish'] )->name('deletdish');
    Route::post('/restaurantReserve',[PageController::class, 'restaurantdeletreserv'] )->name('deletreserve');
    Route::post('/restaurantMeal',[PageController::class, 'addMeal'] )->name('addmeal');
});

//addmeal

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