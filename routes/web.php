<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend route setup

Route::get('/',[App\Http\Controllers\Frontend\FrontController::class,'index']);

Route::get('/tutorials/{category_slug}',[App\Http\Controllers\Frontend\FrontController::class,'viewcategorypost']);

Route::get('/tutorials/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontController::class,'viewpost']);

// auth route setup

Auth::routes();

// ADMIN ROUTE SETUP

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','IsAdmin'])->group(function () {

   Route:: get('/dashboard', [App\Http\Controllers\admin\dashboardcontroller::class, 'index']);

//    category route

   Route:: get('/categories', [App\Http\Controllers\admin\CategoriesController::class, 'index']);

   Route:: get('/add_category', [App\Http\Controllers\admin\CategoriesController::class, 'create']);

   Route:: post('/add_category', [App\Http\Controllers\admin\CategoriesController::class, 'store']);

   Route:: get('/edit_category/{category_id}', [App\Http\Controllers\admin\CategoriesController::class, 'edit']);

   Route:: put('update_category/{category_id}', [App\Http\Controllers\admin\CategoriesController::class, 'update']);

   Route:: get('delete_category/{category_id}', [App\Http\Controllers\admin\CategoriesController::class, 'destroy']);


   //post route

      Route:: get('/posts', [App\Http\Controllers\admin\PostController::class, 'index']);

      Route:: get('/add_post', [App\Http\Controllers\admin\PostController::class, 'create']);

      Route:: post('/add_post', [App\Http\Controllers\admin\PostController::class, 'store']);

      Route:: get('/edit_post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'edit']);

      Route:: put('update_post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'update']);

      Route:: get('delete_post/{post_id}', [App\Http\Controllers\admin\PostController::class, 'destroy']);


    //   user route

     Route:: get('/user', [App\Http\Controllers\admin\UserController::class, 'index']);

     Route:: get('user_edit/{user_id}', [App\Http\Controllers\admin\UserController::class, 'edit']);

     Route:: put('user_update/{user_id}', [App\Http\Controllers\admin\UserController::class, 'update']);


});
