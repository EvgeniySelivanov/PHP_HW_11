<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PostController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ReviewsAdminController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



/* Route::get('/', function () {
    return view('welcome');
});
 */
Route::get('/', [MainController::class,'index'])->name('home');
Route::get('category/{id}', [MainController::class,'categoryPost']);

Route::get('contacts', [MainController::class,'contacts']);
Route::post('get-form', [MainController::class,'getForm']);
Route::get('reviews', [ReviewsController::class,'index']);
Route::get('reviewsadmin', [ReviewsAdminController::class,'index']);
Route::get('/createreviews',[ReviewsController::class,'createReviews']);
Route::get('/createreviewsadmin',[ReviewsadminController::class,'createReviews']);

Route::get('/deletereviews',[ReviewsadminController::class,'deleteReviews']);

/* Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class); */

Route::get('editreviews', [ReviewsadminController::class,'editReviews']);

/* Route::resource('reviewsadmin',ReviewsAdminController::class); */

Auth::routes();


/*группа ссылок для админа */
Route::prefix('admin')->middleware(['auth','admin'])->group(
    function()
    {
        Route::get('/',[AdminController::class,'index']);
        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
       
    }



);






//Route::get('admin',[AdminController::class,'index'])->middleware('auth','admin');


