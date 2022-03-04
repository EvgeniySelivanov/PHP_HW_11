<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PageController;

use Illuminate\Support\Facades\Route;



/* Route::get('/', function () {
    return view('welcome');
});
 */
Route::get('/', [MainController::class,'index']);
Route::get('contacts', [MainController::class,'contacts']);
Route::post('get-form', [MainController::class,'getForm']);
Route::get('page', [PageController::class,'index']);



Route::resource('categories', CategoryController::class);

