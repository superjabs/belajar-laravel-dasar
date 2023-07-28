<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\ArrayInput;

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

// route parameter
// 1 param
Route::get('/products/{id}', function($productsId){
    return "Products : " . $productsId;
})->name('product.detail');

// more param
Route::get('/products/{id}/items/{items}', function($productsId, $itemsId){
    return "Products : " . $productsId . ", items : " . $itemsId;
})->name('product.item.detail');

// param only int with regex
Route::get('/categories/{id}', function($categoryId){
    return "categories : " . $categoryId;
})->where('id', '[0-9]+')->name('category.detail');

// emptyless param, add ? in last param
Route::get('/users/{id?}', function($userId = 404){
    return "users : " . $userId;
})->name('user.detail');

// conflict routing
Route::get('/conflict/al', function(){
    return "conflict alfian" ;
});

Route::get('/conflict/{name}', function($name){
    return "conflict : " . $name;
});

// named route
Route::get('/produk/{id}', function($id){
    $link = route('product.detail', [
        'id' => $id
    ]);

    return "Link : " . $link;
});

Route::get('/produk-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', [
        'id' => $id
    ]);
});


// Request
Route::get('/controller/hello/request', [HelloController::class, 'request']);
// route from controller
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

// Request Input
Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

// nested input
Route::get('input/hello/first', [InputController::class, 'helloFirst']);

// input all
Route::post('/input/hello/input', [InputController::class, 'helloInput']);

// array input
Route::post('input/hello/array', [InputController::class, 'arrayInput']);

//query input
Route::post('input/hello/query', [InputController::class, 'queryInput']);