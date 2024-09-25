<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    #users
    Route::resource('/users',UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

    #Permissions
    Route::resource('/permissions',PermissionController::class);

    #Roles
    Route::resource('/roles',RoleController::class);
    #Categories
    Route::resource('/categories',CategoryController::class);
    #Products
    Route::resource('/products',ProductController::class);
    #orders
    Route::resource('/orders',OrderController::class);
    #Profile
    Route::get('/profile',[ProfileController::class, 'index']);
    #Pos
    Route::get('/pos',[PosController::class, 'index']);
    Route::get('/pos/orders',[PosController::class, 'orders']);

    
});