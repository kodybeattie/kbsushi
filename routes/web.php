<?php

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

/* LESSON 1*/ 
Route::get('/', function () {
    return view('welcome');
});
Route::get('/sushi', function () {
    return view('sushi');
});

Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/productlist', function () {
    return view('backend/productlist');
});
Route::get('/addproduct', function () {
    return view('backend/addproduct');
});
Route::get('/dashboard', function () {
    return view('backend/dashboard');
});
Route::get('/orders', function () {
    return view('backend/orders');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/checkout', function () {
    return view('checkout');
});







Route::get('/home', 'HomeController@index')->name('home');
