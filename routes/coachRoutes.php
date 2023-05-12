<?php

use Illuminate\Support\Facades\Route;


//    Route::get('/', [\App\Http\Controllers\coach\DashboardController::class, 'index']);
//    Route::get('/dashboard', function (){
//        return view('coach.Dashboard.analytics');
//    });

Route::get('/', function(){
  return  redirect(url('/coach/analytics'));
});
Route::resource('/categories', \App\Http\Controllers\coach\category\CategoryController::class);
Route::resource('/brands', \App\Http\Controllers\coach\brand\BrandController::class);
Route::resource('/products', \App\Http\Controllers\coach\supplement\SupplementController::class);
Route::get('/equipments/categories', [\App\Http\Controllers\coach\equipment\EquipmentController::class,'categories']);
Route::resource('/muscles', \App\Http\Controllers\coach\muscle\MuscleController::class);
Route::resource('/purchase', \App\Http\Controllers\coach\purchase\PurchaseController::class);
Route::resource('/subscriptions', \App\Http\Controllers\coach\subscription\SubscriptionController::class);
Route::resource('/users', \App\Http\Controllers\coach\user\UserController::class);
Route::get('/analytics', [\App\Http\Controllers\coach\dashboard\DashboardController::class,'index']);
Route::get('/sales', [\App\Http\Controllers\coach\dashboard\SalesController::class,'index']);

