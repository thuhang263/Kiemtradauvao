<?php

use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CompanyController;
use \App\Http\Controllers\PersonController;
use \App\Http\Controllers\RoleController;

Route::get('/', function () {
    return view('welcome');
});
#country
Route::prefix('countries')->group(function (){
    Route::get('add',[CountryController::class,'create']);
    Route::post('add',[CountryController::class,'store']);
    Route::get('list',[CountryController::class,'index']);
    Route::get('edit/{country}',[CountryController::class,'show']);
    Route::post('edit/{country}',[CountryController::class,'update']);
    Route::DELETE('destroy',[CountryController::class,'destroy']);
});

#user

Route::prefix('users')->group(function (){
    Route::get('add',[UserController::class,'create']);
    Route::post('add',[UserController::class,'store']);
    Route::get('list',[UserController::class,'index']);
    Route::get('edit/{user}',[UserController::class,'show']);
    Route::post('edit/{user}',[UserController::class,'update']);
    Route::DELETE('destroy',[UserController::class,'destroy']);
});

#company
Route::prefix('companies')->group(function (){
    Route::get('add',[CompanyController::class,'create']);
    Route::post('add',[CompanyController::class,'store']);
    Route::get('list',[CompanyController::class,'index']);
    Route::get('edit/{company}',[CompanyController::class,'show']);
    Route::post('edit/{company}',[CompanyController::class,'update']);
    Route::DELETE('destroy',[CompanyController::class,'destroy']);
});

#person
Route::prefix('people')->group(function (){
    Route::get('add',[PersonController::class,'create']);
    Route::post('add',[PersonController::class,'store']);
    Route::get('list',[PersonController::class,'index']);
    Route::get('edit/{person}',[PersonController::class,'show']);
    Route::post('edit/{person}',[PersonController::class,'update']);
    Route::DELETE('destroy',[PersonController::class,'destroy']);
});
#role
Route::prefix('roles')->group(function (){
    Route::get('add',[RoleController::class,'create']);
    Route::post('add',[RoleController::class,'store']);
    Route::get('list',[RoleController::class,'index']);
    Route::get('edit/{role}',[RoleController::class,'show']);
    Route::post('edit/{role}',[RoleController::class,'update']);
    Route::DELETE('destroy',[RoleController::class,'destroy']);
});
