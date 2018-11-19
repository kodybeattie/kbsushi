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

Route::post('/sushi', 'ProductController@addSushiToCart');

Route::post('/checkout', 'OrderController@create');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');


Route::get('/edit', function () {
    return view('backend/edit{product}');
});



Route::get('/drinks', function () {
    return view('drinks');
})->name('drinks');

Route::post('/drinks', 'ProductController@addDrinkToCart');

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

// Route::get('/productlist', function () {
//     return view('backend/productlist');
// });
Route::get('/productlist', 'ProductController@show');
Route::get('delete/{product_id}','ProductController@destroy');
Route::get('edit/{id}','ProductController@editshow');
Route::post('edit/{id}','ProductController@edit');



Route::get('/addproduct', ['middleware' => 'admin', function () {
    return view('backend/addproduct');
}]);

 Route::post('/backend/addproduct','ProductController@addProduct');



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

Route::get('/checkout', 'CheckoutController@show')->name('checkout');
