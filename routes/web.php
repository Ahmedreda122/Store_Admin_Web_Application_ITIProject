<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AmazonController;

Route::get('/Products', [AmazonController::class, 'getProducts']);

Route::get('/Home',function() {
    return view('main');
})->name("Home@Amazon");;

Route::get('/AboutUs', function() {
    return view('aboutUs');
})->name("AboutUs@Amazon");

Route::get('/contactUs', function() {
    return view('contact');
})->name('contactUs@Amazon');

Route::get('/products/index', [AmazonController::class, 'index'])->name("products@index");;

Route::get('/info/{id}', [AmazonController::class, 'show'])->name('products@show');

Route::get('/delete/{id}', [AmazonController::class, 'delete'])->name('products@delete');

Route::get('/create/', [AmazonController::class, 'create'])->name('products@create');

Route::post('/store/', [AmazonController::class, 'store'])->name('products@store');

Route::get('/edit/{id}', [AmazonController::class, 'edit'])->name('products@edit');

Route::put('/update/{id}', [AmazonController::class, 'update'])->name('products@update');

use App\Http\Controllers\CategoryController;
Route::resource("categories", CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
