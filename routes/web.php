<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Front\FrontController;

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

Route::get('/', [FrontController::class, 'home']);
Route::get('blog', [FrontController::class, 'blog_post']);
Route::get('blog/{id}', [FrontController::class, 'blog_details']);
Route::get('categories', [FrontController::class, 'categories']);
Route::get('latestpost', [FrontController::class, 'latestPost']);
Route::get('postbycategory/{id}', [FrontController::class, 'postbycategory']);
Route::get('blogSearch', [FrontController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::as('admin.')->prefix('admin/')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    //category
    Route::get('category', [CategoryController::class, 'all_category']);
    Route::get('category-add', function(){
        return view('backend.layouts.app');
    });
    Route::post('category-store', [CategoryController::class, 'store']);
    Route::get('delete/category/{id}', [CategoryController::class, 'destroy']);
    Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('category/update/{id}', [CategoryController::class, 'update']);
    Route::get('deletecategoryitems/{id}', [CategoryController::class, 'delete_selected_category']);
    //post
    Route::get('post', [PostController::class, 'index']);
    Route::get('post-add', function(){
        return view('backend.layouts.app');
    });
    Route::post('post-store', [PostController::class, 'store']);
    Route::get('delete/post/{id}', [PostController::class, 'destroy']);
    Route::get('post/edit/{id}', [PostController::class, 'edit']);
    Route::post('post/update/{id}', [PostController::class, 'update']);

});

