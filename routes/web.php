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

Auth::routes();

  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/about', 'HomeController@about')->name('about');
  Route::get('/contact', 'HomeController@contact')->name('contact');
  Route::group(['middleware' => ['web']], function(){
  Route::post('/shipping', 'CartController@cekOngkos')->name('cart.ongkir');
  Route::get('/cart', 'CartController@index')->name('cart.index');
  Route::post('/cart/add', 'CartController@add')->name('cart.store');
  Route::post('/cart/remove', 'CartController@remove')->name('cart.remove');
  Route::put('/cart', 'CartController@update')->name('cart.update');
  Route::get('/cart/basket', 'CartController@basket')->name('cart.basket');
  Route::get('/cart/checkout', 'TransaksiController@create')->name('transaksi.create');
  Route::geT('/category', 'KategoriController@index_user')->name('kategori.index_user');
  Route::get('/shop', 'ProdukController@index_produk')->name('produk.index_produk');
  Route::get('/shop/{slug}', 'ProdukController@produk_kategori')->name('produk.index_produk_kategori');
  Route::get('/p/{slug}', 'ProdukController@show_produk')->name('produk.show_produk');
  Route::get('/u/{username}', 'UsersController@show')->name('user.show');
});

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::post('/cart/checkout', 'TransaksiController@store')->name('transaksi.store');
    Route::get('user/ticket', 'KonfirmasiController@index_user')->name('konfirmasi.index');
    Route::get('/checkout/confirmation', 'KonfirmasiController@create')->name('konfirmasi.create');
    Route::post('/checkout/confirmation', 'KonfirmasiController@store')->name('konfirmasi.store');
    Route::get('dashboard', 'UsersController@dashboard')->name('user.dashboard');
    Route::get('/profile/password', 'UsersController@edit_password')->name('user.password.edit');
    Route::get('/profile', 'UsersController@edit_profile')->name('user.profile.edit');
    Route::put('/profile', 'UsersController@update_account')->name('user.profile.update');
    Route::put('/profile/password', 'UsersController@update_password')->name('user.password.update');
    Route::get('/user/order', 'TransaksiController@index_user')->name('transaksi.index_user');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('admin.dashboard');
    Route::get('ticket', 'KonfirmasiController@index')->name('konfirmasi.index');
    Route::put('ticket/{id}', 'KonfirmasiController@update')->name('konfirmasi.update');
    Route::get('transaksi', 'TransaksiController@index')->name('transaksi.index');
    Route::put('transaksi/{id}', 'TransaksiController@update')->name('transaksi.update');
    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
});
