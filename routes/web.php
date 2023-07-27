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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function(){
    return "Halo bang!";
});


Route::redirect("/web", "/profile");

// not found page
Route::fallback(function(){
    return "page not found";
});

// instant way
Route::view('/hello', 'hello', ['nama' => 'alfian']);

// manual
Route::get('/hello-again', function(){
    return view('hello-again', ['nama' => 'alfian']);
});

// nested views page
Route::get('/hello-world', function(){
    return view('hello.world', ['time' => 'morning']);
});