<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\OrderController;

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

// Releated Docs: https://laravel.com/docs/10.x/routing#basic-routing

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    echo "Thist is the home page";
});

//Named route
Route::get('/about', function(){
 echo route('about');
})->name('about');

//Routing params
////Required params
Route::get('/posts/{id}', function (int $id) {
    echo $id;
});


////Optional params
Route::get('/user/{name?}', function (?string $name = null) {

  return is_null($name) ? "Optional name param is not filled" : $name;
});

//Route Model Binding 
Route::get('/users/{user}', function (User $user) {
    return $user->email;
});

//Route Groups

////Controller groups
Route::controller(OrderController::class)->group(function () {
    //Route::get('/orders/{id}', 'show');
    Route::get('/orders/{id}', 'show');
    Route::post('/orders', 'store');
})->name('order');

Route::fallback(function () {
    echo "404";
});