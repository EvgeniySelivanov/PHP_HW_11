<?php
use App\Http\Controllers\PostController;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\ReviewsAdminController;
use App\Http\Controllers\ReviewsadminController as ControllersReviewsadminController;
use App\Models\Reviewsadmin;
use Illuminate\Support\Facades\Route;



/* Route::get('/', function () {
    return view('welcome');
});
 */
Route::get('/', [MainController::class,'index'])->name('home');
Route::get('contacts', [MainController::class,'contacts']);
Route::post('get-form', [MainController::class,'getForm']);
Route::get('reviews', [ReviewsController::class,'index']);
Route::get('reviewsadmin', [ReviewsAdminController::class,'index']);
Route::get('/createreviews',[ReviewsController::class,'createReviews']);
Route::get('/createreviewsadmin',[ReviewsadminController::class,'createReviews']);

Route::get('/deletereviews',[ReviewsadminController::class,'deleteReviews']);
Route::resource('categories', CategoryController::class);
Route::resource('posts', PostController::class);

Route::get('editreviews', [ReviewsadminController::class,'editReviews']);
/* Route::get('update', [ReviewsadminController::class,'update']); */

Route::resource('reviewsadmin',ReviewsAdminController::class);







Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
