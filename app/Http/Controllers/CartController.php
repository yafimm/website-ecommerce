<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Transaksi;
use Cart;
use Steevenz\Rajaongkir;

class CartController extends Controller
{
    public function index(){
      $cart_all = Cart::getContent();
      $totalHargaProduk = Cart::getTotal();
      // $dataOngkir = RajaOngkir::city();
      return view('cart.cart', compact('cart_all', 'totalHargaProduk'));
    }

    public function add(Request $request)
    {
       $produk = Produk::find($request->id);
       if($produk){
         Cart::add($produk->id, $produk->nama, $produk->harga, $request->jumlah, ['image' => $produk->gambar]);
         return $produk->nama;
       }
       return false;
    }


    public function basket()
    {
       $response = Cart::getContent()->toJson(JSON_PRETTY_PRINT);
       return $response;
        // $id = 'TRS190513002';
        // $Transaksi = Transaksi::find($id);
        // $Transaksi = $Transaksi;
        // return $Transaksi;
    }

    public function total(){
      return Cart::total();
    }

    public function checkout()
    {
        if (Cart::count() == 0) {
            return Redirect::to('/');
        } else {
            return View::make('cart.checkout')
                       ->with('title', 'Cart &rarr; Checkout');
        }
    }

    public function remove(Request $request)
    {
        $rowid = $request->rowId;
        Cart::remove($rowid);
    }

    public function destroy()
    {
        Cart::clear();
        return redirect()->back();
  }

    public function update(Request $request)
    {
        $quantity = $request->quantity;
        $rowid = $request->rowid;

        for ($i=0; $i<count($rowid); $i++) {
            Cart::update($rowid[$i], array('qty' => $quantity[$i]));
        }

        return Redirect::to('basket');
    }

    public function cekOngkos(Request $request){
       $kota_asal_id = 23;
       $kota_tujuan_id = $request->idkota;
       $berat = 1700; // dalam gram
       $kurir = "jne";
       $list_biaya = RajaOngkir::cost($kota_asal_id, $kota_tujuan_id, $berat, $kurir);
       return $list_biaya;
    }
}
