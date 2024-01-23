

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::middleware('auth:sanctum')->post('/logout', [LoginController::class,'logout']);
Route::middleware('api')->middleware('auth:sanctum')->group(function () {Route::resource('Product', ProductController::class);});
Route::middleware('api')->middleware('auth:sanctum')->group(function () {Route::resource('Client', ClientController::class);});
Route::middleware('api')->group(function () {Route::resource('Category', CategoryController::class);});
Route::middleware('api')->group(function () {Route::resource('SCategory', ScategoryController::class);});
Route::middleware('api')->group(function () {Route::resource('Cart', CartController::class);});
Route::middleware('api')->middleware('auth:sanctum')->group(function () {Route::resource('Admin', AdminController::class);});
Route::middleware('api')->group(function () {Route::resource('Order', OrderController::class);});
Route::get('/scat/{idcat}',[ScategoryController::class,'showSCategorieByCAT']);
Route::middleware('auth:sanctum')->get('/produit/{idproduit}',[ProductController::class,'showProduitBySCAT']);
Route::middleware('api')->delete('Cart/promise/{product}', [CartController::class, 'destroyByProduct']);
Route::get('/Product', [CartController::class, 'index2']);
Route::middleware('api')->middleware('auth:sanctum')->get('Cart/getCartsByUsername/{Username}', [CartController::class, 'getCartsByUsername']);
Route::middleware('api')->post('/createpayment', 'App\Http\Controllers\PaymentController@createPaymentIntent');