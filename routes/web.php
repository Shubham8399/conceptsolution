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
Route::get('/', function () {
    return redirect('index');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/register', 'Homecontroller@showregister');

Route::get('/login', 'Homecontroller@showlogin');

Route::post('/insert_register', 'Homecontroller@doregister');

Route::post('/checklogin', 'Homecontroller@dologin');

Route::get('/category', 'Homecontroller@showcategory');

Route::get('/detail', 'Homecontroller@showdetails');

Route::get('/checkout', 'Homecontroller@show_checkout');


// Route::resource('/home', 'Homecontroller');
