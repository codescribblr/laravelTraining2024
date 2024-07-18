<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckAge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/user/{name}', function ($name) {
    return 'Hello ' . $name;
});

Route::get('/user/{name?}', function($name = 'John Doe') {
    return 'Hello ' . $name;
});

Route::get('/dashboard', function () {
    return 'Dashboard';
})->name('dashboard');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::post('/form', function (Request $request) {
    $name = $request->input('name');
    return redirect()->route('form')->with('name', $name);
})->name('form.submit');


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{name}', [UserController::class, 'show']);

Route::resource('posts', PostController::class);

Route::get('/restricted', function () {
    return 'You are old enough!';
})->middleware(CheckAge::class);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/expensive', [ProductController::class, 'expensiveProducts'])->name('products.expensive');
Route::get('/products/aggregate', [ProductController::class, 'aggregateData'])->name('products.aggregate');

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);
Route::resource('profiles', ProfileController::class);

Route::get('/demo/create', [DemoController::class, 'create'])->name('demo.create');
Route::post('/demo/store', [DemoController::class, 'store'])->name('demo.store');


