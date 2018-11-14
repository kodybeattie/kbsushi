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
Route::get('/','HomeController@index')->name('home');

Route::get('/sushi', function () {
    return view('sushi');
})->name('sushi');

Route::post('/sushi', 'ProductController@cart');

Route::get('/drinks', function () {
    return view('drinks');
})->name('drinks');

Route::get('/settings','SettingsController@show')->name('settings');
Route::post('/settings','SettingsController@update');


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/favorites', function () {
    return view('favorites');
});

Route::get('/productlist', function () {
    return view('backend/productlist');
})->middleware('auth');

Route::get('/addproduct', function () {
    return view('backend/addproduct');
})->middleware('auth');

Route::get('/dashboard', function () {
    return view('backend/dashboard');
});

Route::get('/orders', function () {
    return view('backend/orders');
})->middleware('auth');

Route::get('/register','RegisterController@create')->name('register');
Route::post('/register','RegisterController@store');

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login','LoginController@store');
Route::get('/logout', 'LoginController@destroy');


//Route::get('/cart', 'ProductController@cart')->name('cart');
//Route::post('/cart', 'ProductController@cart')->name('cart');


Route::get('/checkout', function () {
    return view('checkout');
})->middleware('auth');
