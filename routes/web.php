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
Route::get('/user/{username}', 'UsersController@show')->name('user.show');

Route::group(['middleware' => ['web']], function(){
  Route::get('/shop', 'ProdukController@index_produk')->name('produk.index_produk');
  Route::get('/shop/{slug}', 'ProdukController@produk_kategori')->name('produk.index_produk_kategori');
  Route::get('/product/{slug}', 'ProdukController@show_produk')->name('produk.show_produk');
});

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('dashboard', 'UsersController@dashboard')->name('user.dashboard');
    Route::get('dashboard/account', 'UsersController@account')->name('account.index');
    Route::post('dashboard/account', 'UsersController@update_account')->name('account.update');
    Route::put('dashboard/account/password', 'UsersController@update_password')->name('account.password.update');

});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::get('dashboard', 'UsersController@admindashboard')->name('admin.dashboard');
    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
});
