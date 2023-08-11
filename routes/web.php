<?php

use App\Exceptions\ValidationException;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

// request input
Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);

// nested input
Route::get('/input/hello/first', [InputController::class, 'helloFirst']);

// input all
Route::post('/input/hello/input', [InputController::class, 'helloInput']);

// array input
Route::post('/input/hello/array', [InputController::class, 'arrayInput']);

//query input
Route::post('/input/hello/query', [InputController::class, 'queryInput']);

// input type
Route::post('/input/type', [InputController::class, 'inputType']);

// input filter only
Route::post('/input/type/only', [InputController::class, 'filterOnly']);

// input filter except
Route::post('/input/type/except', [InputController::class, 'filterExcept']);

// input filter merge
Route::post('/input/type/merge', [InputController::class, 'filterMerge']);

// file upload
Route::post('/file/upload', [FileController::class], 'upload')
    ->withoutMiddleware(VerifyCsrfToken::class);

// response
Route::get('/response/hello', [ResponseController::class, 'response']);

// response header
Route::get('/response/header', [ResponseController::class, 'header']);

// group response
Route::prefix('/response/type')->group(function(){
    // response view
    Route::get('/view', [ResponseController::class, 'responseView']);
    // response json
    Route::get('/json', [ResponseController::class, 'responseJson']);
});

// mutliple group controller | controller, prefix and group
// looks clean ✨
Route::controller(CookieController::class)->prefix('/cookie')->group(function(){
    // set cookie
    Route::get('/set', 'createCookie');
    // get cookie
    Route::get('/get', 'getCookie');
    // clear cookie
    Route::get('/clear', 'clearCookie');
});


// redirect to
Route::get('/redirect/to', [RedirectController::class, 'redirectTo']);

// redirect from
Route::get('/redirect/from', [RedirectController::class, 'redirectFrom']);

// redirect name
Route::get('/redirect/name', [RedirectController::class, 'redirectName']);

// redirect name with param
Route::get('/redirect/name/{name}', [RedirectController::class, 'redirectHello'])
->name('redirect-hello');

// redirect action
Route::get('/redirect/action', [RedirectController::class, 'redirectAction']);

// redirect away
Route::get('/redirect/away', [RedirectController::class, 'redirectAway']);

// grou middleware
Route::middleware(['contoh:api, 401'])->group(function(){
    // route middleware
    Route::get('/middleware/api', function () {
           return "OK";
    });
    // route middleware group
    Route::get('/middleware/group', function () {
        return "GROUP";
    });
});


// csrf
Route::get('/form', [FormController::class, 'form']);
Route::post('/form', [FormController::class, 'submitForm']);

// url generation
Route::get('/url/current', function() {
    // current or full is optional 😁
    return URL::current();
});

// url named route
Route::get('/url/named', function(){
    return route('redirect-hello', ['name' => 'alfian']);
});

// controller action
Route::get('/url/action', function() {
    return action('/form', [FormController::class, 'form'], []);
});

// create session
Route::get('/session/create', [SessionController::class, 'createSession']);

// get session
Route::get('/session/get', [SessionController::class, 'getSession']);

// error handling
Route::get('/error/sample', function(){
    throw new Exception('Sample error');
});

// error manual
Route::get('/error/manual', function() {
    report(new Exception('Sample error'));
    return "OK";
});

// error validation 😈
Route::get('/error/validation', function(){
    throw new ValidationException('Validation error');
});

// http exception
Route::get('/abort/400', function(){
   abort(400, "ups error :(");
});

Route::get('/abort/500', function(){
    abort(500);
});