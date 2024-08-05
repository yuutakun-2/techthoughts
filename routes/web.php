<?php

use Illuminate\Support\Facades\Route;

use App\Models\Blog;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Middleware\MustBeAdminUser;
use App\Http\Middleware\MustBeAuthUser;
use App\Http\Middleware\MustBeGuestUser;

Route::middleware(MustBeAuthUser::class)->group(function() {
    Route::get('/', [BlogController::class, 'home']);
    Route::get('/blogs', [BlogController::class, 'index']);
    Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
    Route::post('/blogs/{blog:slug}/subscribe', [SubscribeController::class, 'toggle']);
    Route::post('/logout', [LogoutController::class, 'destroy']);
    Route::post('/post', [BlogController::class, 'post']);
    Route::post('/blogs/post', [BlogController::class, 'store']);
});

Route::middleware(MustBeAdminUser::class)->group(function() {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/blogs', [AdminController::class, 'show']);
    Route::get('/admin/create', [AdminController::class, 'create']);
    Route::post('/admin/store', [AdminController::class, 'store']);
    Route::get('/admin/blogs/{blog}/edit', [AdminController::class, 'edit']);
    Route::post('/admin/blogs/{blog}/edit', [AdminController::class, 'update']);
    Route::get('/admin/blogs/{blog}/destroy', [AdminController::class, 'destroy']);
});

Route::middleware(MustBeGuestUser::class)->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
});

Route::get('/community', [BlogController::class, 'community']);
Route::get('/{user:username}', [ProfileController::class, 'show']);
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);


//action - method    view
//all      index     {resource}.index
//single   show     {resource}.show
//create   create   {resource}.create
//create   store   {resource}.store
//edit      edit    {resource}.edit
//destroy   destroy  {resource}.destroy