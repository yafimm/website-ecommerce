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


Route::group(['middleware' => ['web', 'auth']], function(){
    // Route::get('zakat/create', 'ZakatController@create_user')->name('zakat.create.user');
    // Route::get('sumbangan/create', 'SumbanganController@create_user')->name('sumbangan.create.user');
    // Route::post('dashboard/account', 'UsersController@update_account')->name('account.update');
    // Route::put('dashboard/account/password', 'UsersController@update_password')->name('account.password.update');
    // Route::get('pesan/history', 'Pesancontroller@index_history')->name('pesan.history');
    // Route::resource('pesan', 'PesanController');
});


Route::group(['prefix' => 'admin', 'middleware' => ['web','admin']], function(){
    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
});

Route::get('/', 'HomeController@index')->name('home');
