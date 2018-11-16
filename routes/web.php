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

Route::post('/sushi', 'ProductController@addToCart');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/drinks', function () {
    return view('drinks');
})->name('drinks');

Route::get('/settings','SettingsController@show')->name('settings')->middleware('auth');
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

Route::get('/productlist', ['middleware' => 'admin', function () {
    return view('backend/productlist');
}])->middleware('auth');

Route::get('/addproduct', ['middleware' => 'admin', function () {
    return view('backend/addproduct');
<<<<<<< HEAD
}])->middleware('auth');
=======
})->middleware('auth');
 Route::POST('/backend/addproduct','ProductController@addProduct');
     

>>>>>>> 32140268a6486c465869b2277580a75af9de547e

Route::get('/dashboard', ['middleware' => 'admin', function () {
    return view('backend/dashboard');
}]);

Route::get('/orders', ['middleware' => 'admin', function () {
    return view('backend/orders');
}]);



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
