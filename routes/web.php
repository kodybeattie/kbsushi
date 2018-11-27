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
Route::get('/checks',function() {
    return view('checks');
});

Route::get('/sushi', function () {
    return view('sushi');
})->name('sushi');

Route::post('/sushi', 'ProductController@addSushiToCart');

Route::post('/checkout', 'OrderController@create');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

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

Route::get('/favourites', function () {
    return view('favourites');
});

// Route::get('/productlist', function () {
//     return view('backend/productlist');
// });
Route::get('/productlist', 'ProductController@show');
Route::get('delete/{product_id}','ProductController@destroy');

Route::get('edit/{product}','ProductController@editshow');
Route::post('/backend/edit','ProductController@edit');

Route::get('/addproduct', ['middleware' => 'admin', function () {
    return view('backend/addproduct');
}]);

Route::get('/addInventory', ['middleware' => 'admin', function () {
    return view('backend/addInventory');
}]);

Route::post('/backend/addInventory','ProductController@addInventory');

Route::post('/backend/addproduct','ProductController@addProduct');

Route::get('/inventory','ProductController@viewInventory');

Route::get('/viewvendors','VendorsController@index');

Route::get('/addvendors', ['middleware' => 'admin', function () {
    return view('backend/addvendors');
}]);

Route::delete('/viewvendors/{vendor_id}','VendorsController@destroy');

Route::post('/backend/addvendors','VendorsController@addVendor');


Route::get('/dashboard', ['middleware' => 'admin', function () {
    return view('backend/dashboard');
}]);

Route::get('/orders','OrderController@index');

Route::get('/register','RegisterController@create')->name('register');
Route::post('/register','RegisterController@store');

Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login','LoginController@store');
Route::get('/logout', 'LoginController@destroy');

Route::get('/checkout', 'CheckoutController@show')->name('checkout');
