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
      $all_cart = Cart::getContent();
      $totalHargaProduk = Cart::getTotal();
      // dd($all_cart);
      return view('cart.cart', compact('all_cart', 'totalHargaProduk'));
    }

    public function add(Request $request)
    {
       $produk = Produk::find($request->id);
       if($produk && $produk->stok > 0 && $produk->stok > $request->jumlah){
         Cart::add([
                'id' => $produk->id,
                'name' => $produk->nama,
                'price' => $produk->harga,
                'quantity' => $request->jumlah,
                'attributes' => ['image'=> $produk->gambar1,
                                  'slug' => $produk->slug]
           ]);
         return $produk->nama;
       }
       return false;
    }


    public function basket()
    {
       $response = Cart::getTotalQuantity();
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
        $remove = Cart::remove($rowid);
        if($remove)
        {
          return 'Success';
        }
        return 'Failed';
    }

    public function destroy()
    {
        Cart::clear();
        return redirect()->back();
  }

    public function update(Request $request)
    {
        $quantity = $request->quantity;
        $rowId = $request->rowId;
        for ($i=0; $i<count($rowId); $i++) {
            $update = Cart::update($rowId[$i], array('quantity' => array(
                                                  'relative' => false,
                                                  'value' => $quantity[$i]
                                              )));
        }
        if($update){
          return redirect()->route('cart.index')->with('alert-class', 'alert-success')->with('flash_message', 'Cart updated successfully');
        }
        return redirect()->route('cart.index')->with('alert-class', 'alert-danger')->with('flash_message', 'Cart failed to updated');
    }

    public function cekOngkos(Request $request){
       $kota_asal_id = 23;
       $kota_tujuan_id = $request->idkota;
       // $kota_tujuan_id = 21;
       $berat = 1700; // dalam gram
       $kurir = "jne";
       $rajaongkir = new Rajaongkir('0b66d0686246de09238dc70b8d026ec2', Rajaongkir::ACCOUNT_STARTER);
       $cost = $rajaongkir->getCost(
                                      ['city' => $kota_asal_id],
                                      ['city' => $kota_tujuan_id],
                                      $berat,
                                      $kurir);


        // dd($cost);
       return $cost;
    }
}
