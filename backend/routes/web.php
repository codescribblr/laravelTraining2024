<?php

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
