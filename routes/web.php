<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Front\CategoryController as FrontCategoryController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\DashboardController as FrontDashboardController;
use App\Http\Controllers\Front\CommentController;

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

Auth::routes();

Route::get('/', function () {
    return redirect()->route('front.dashboard');
});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});



Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
});


Route::group(['as' => 'front.'], function () {
    Route::get('/', [FrontDashboardController::class, 'index'])->name('dashboard');
    Route::post('comment/submit', CommentController::class)->name('comment.submit');
    Route::resource('categories', FrontCategoryController::class);
    Route::resource('posts', FrontPostController::class);
});
