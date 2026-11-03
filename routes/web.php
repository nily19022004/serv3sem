<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;

Route::resource('article', ArticleController::class)->middleware('auth:sanctum');

// Route::group(['prefix'=> '/article', 'middleware' => 'auth'], function(){
//     Route::get('', [ArticleController::class,'index']);
//     Route::get('/create', [ArticleController::class,'create']);
//     Route::get('store', [ArticleController::class,'store']);
// });

// Auth
Route::get('/auth/create', [AuthController::class,'create']);
Route::post('/auth/signUp', [AuthController::class,'signUp']);
Route::get('/auth/login', [AuthController::class,'login'])->name('login');
Route::post('/auth/signIn', [AuthController::class,'customlogin']);
Route::get('/auth/logout', [AuthController::class,'logout']);


Route::get('/', [MainController::class, 'index']);
Route::get('/galery/{full_image}', [MainController::class, 'show']);

Route::get('/about', function () {
    return view('main/about');
});

Route::get('/contact', function(){
    $contact = [
        'name' => 'Polytech',
        'adres' => 'B.Semenovskaya',
        'phone' => '8(495) 423-2323',
        'email'=> '@mospolytech.ru',
    ];
    return view('main/contact', ['contact' => $contact]);
});