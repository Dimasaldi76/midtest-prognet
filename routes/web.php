<?php

use App\Http\Controllers\DashboardProductController;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginControllerAdmin;
=======
use App\Http\Controllers\DashboardCourierController;
use App\Http\Controllers\DashboardCategoriesController;
>>>>>>> c1e7f82294dd2d121c1ffab284f8ad7502a5c9d6

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

Route::get('/', function () {
    return view('welcome');
});

*/

Auth::routes();
Auth::routes(['verify' => true]); //verifikasi email

<<<<<<< HEAD
//Route USER
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('keluhan/add', [HomeController::class, 'add']);
Route::post('keluhan/add', [HomeController::class, 'addprocess']);
Route::get('keluhan/edit/{id}', [HomeController::class, 'edit']);
Route::patch('keluhan/edit/{id}', [HomeController::class, 'editprocess']);
Route::delete('keluhan/{id}', [HomeController::class, 'delete']);


Auth::routes();

Auth::routes(['verify' => true]);

//Route ADMIN
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
Route::get('/dashboard', [AdminController::class, 'indexadmin'])->name ('dashboard');
Route::delete('user/{id}', [AdminController::class, 'delete']); 
Route::get('keluhan', [AdminController::class, 'index']);   
Route::get('keluhan/edit/{id}', [AdminController::class, 'edit']);
Route::patch('keluhan/{id}', [AdminController::class, 'editprocess']);
Route::delete('keluhan/{id}', [AdminController::class, 'deletekeluhan']);
Route::get('logoutAdmin', [App\Http\Controllers\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');
});
Route::get('/admin', [App\Http\Controllers\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\LoginControllerAdmin::class, 'action'])->name('actionlogin');
=======

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing')->middleware('verified');
Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('userprofile');

Route::get('/admin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name ('dashboard');
  });
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/products', DashboardProductController::class);
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kategori', DashboardCategoriesController::class);
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
  Route::resource('/kurir', DashboardCourierController::class);
});
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

>>>>>>> c1e7f82294dd2d121c1ffab284f8ad7502a5c9d6
