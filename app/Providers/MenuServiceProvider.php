<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      $halaman = 'home'; // default

      if (Request::segment(1) == 'about') {
           $halaman = 'about';
      }

      if (Request::segment(1) == 'shop' || Request::segment(1) == 'p') {
           $halaman = 'shop';
      }

      if (Request::segment(1) == 'contact') {
           $halaman = 'contact';
      }

      if(Request::segment(1) == 'dashboard'){
           $halaman = 'dashboard';
           if(Request::segment(2) == 'transaksi'){
                 $halaman = 'pesanan';
           }

           if(Request::segment(2) == 'account'){
                 $halaman = 'account';
           }
      }

      if(Request::segment(1) == 'admin'){
           if(Request::segment(2) == 'dashboard'){
                 $halaman = 'dashboard';
           }

           if(Request::segment(2) == 'produk' || Request::segment(2) == 'tipe' || Request::segment(2) == 'warna' || Request::segment(2) == 'size'){
                 $halaman = 'produk';
           }

           if(Request::segment(2) == 'record_transaksi' || Request::segment(2) == 'keuangan'){
                 $halaman = 'keuangan';
           }

           if(Request::segment(2) == 'transaksi'){
                 $halaman = 'pesanan';
           }


      }

      view()->share('halaman', $halaman);
    }
}
