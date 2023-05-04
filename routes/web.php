<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;

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

Route::get('/', [BlogController::class,"index"]);


Route::get('/login',[UserController::class,"Loginindex"]);

Route::post('/login',[UserController::class,"authenticate"]);

Route::post('/logout',[UserController::class,"logout"]);

Route::get('/register', [UserController::class,"Registerindex"]);

Route::post('/register', [UserController::class,"store"]);


Route::get('/blog/{blog}',[BlogController::class,"Blogindex"])->where("blog", "[0-9]{1,9}");

Route::delete('/blog/{blog}',[BlogController::class,"destroy"])->where("blog", "[0-9]{1,9}");

Route::get('/blog/create',[BlogController::class,"CreateBlog"]);

Route::post('/blog/create',[BlogController::class,"store"]);

Route::get('/blog/myblog',[BlogController::class,"Myblogindex"]);

Route::get('/blog/edit/{blog}',[BlogController::class,"EditBlogindex"]);

Route::put('/blog/edit/{blog}',[BlogController::class,"update"]);
