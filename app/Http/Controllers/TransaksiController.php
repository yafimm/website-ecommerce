<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\Rajaongkir;
use Cart;

class TransaksiController extends Controller
{
    public function __construct()
    {
          $this->middleware('checkout', ['only' => ['create']]);
    }

    protected function detailTransaksi($user, $id)
    {
          $transaksi_produk  = Transaksi::find($id)->produk;
          $transaksi = $user->transaksi->find($id);
          return view('transaksi.detailuser', compact('transaksi', 'transaksi_produk'));
    }

    //fungsi ini ngambil data detail transaksi dari cart
    private function data_detail_transaksi()
    {
          $size = $warna = $harga = $jumlah = $id_produk = $dataProdukTransaksi = array();
          $all_data = Cart::content(); // ngambil semua data cart dari class Cart

          if($all_data != null){
              foreach ($all_data as $key => $data) {
                array_push($id_produk, $data->id);
                array_push($size, $data->options->size);
                array_push($warna, $data->options->color);
                array_push($harga, $data->price);
                array_push($jumlah, $data->qty);
              }

              //Fungsi biar array jadi "nama" => nilai , soalnya data ini digunakan untuk attach ke tabel relasinya
              $size = Yaf_give_indexArr("size", $size);
              $warna = Yaf_give_indexArr("warna", $warna);
              $harga = Yaf_give_indexArr("harga", $harga);
              $jumlah = Yaf_give_indexArr("jumlah", $jumlah);

              // kombinasi dari semua array jadi satu array sesuai dengan indexnya
              foreach($id_produk as $key=>$val){ // Loop though one array
                $dataProdukTransaksi['detail'][$key] = $size[$key] + $warna[$key] + $harga[$key] + $jumlah[$key];
              }

              $dataProdukTransaksi['id_produk'] = $id_produk;

              return $dataProdukTransaksi;
          }else{
              return false;
          }

    }

    //Fungsi untuk menampilkan data transaksi user yang dilihat oleh admin
    public function index()
    {
          $all_transaksi = Transaksi::whereIn('status', ['Belum dibayar', 'Sedang Dikirim'])->orderBy('status', 'asc')->simplePaginate(20);
          return view('transaksi.index', compact('all_transaksi'));
    }

    public function create()
    {
          $all_cart = Cart::getContent();
          $totalHargaProduk = Cart::getTotal();
          $rajaongkir = new Rajaongkir('0b66d0686246de09238dc70b8d026ec2', Rajaongkir::ACCOUNT_STARTER);
          $dataOngkir = $rajaongkir->getCities();
          // dd($dataOngkir);
          return view('transaksi.checkout', compact('all_cart', 'totalHargaProduk', 'dataOngkir'));
    }

    //Fungsi untuk menampilkan data transaksi user
    public function index_user(Request $request)
    {
          $user = Users::find(\Auth::guard('users')->user()->username);
          $all_transaksi = Users::find(\Auth::guard('users')->user()->username)->transaksi()->orderBy('status', 'desc')->simplePaginate(10);

          // if yang ini untuk menampilkan detailnya
          if(isset($request->id)){
                return $this->detailTransaksi($user, $request->id);
          }else{
                return view('transaksi.indexuser', compact('all_transaksi'));
          }
    }

    public function record_transaksi()
    {
          $all_transaksi = Transaksi::where('status', 'Transaksi Selesai')->simplePaginate(20);
          return view('transaksi.record_transaksi', compact('all_transaksi'));
    }

    public function store(Request $request)
    {

          $dataProdukTransaksi = $this->data_detail_transaksi();
          if($dataProdukTransaksi)
          {
              $input = $request->all();
              $id_kota = $input['city_id'];
              $input['alamat'] = $this->set_alamat_tujuan($input['city_id'], $input['alamat_detail']);
              if($input['alamat'])
              {
                  $input['id'] = setIdTransaksi();
                  $input['username'] = \Auth::guard('users')->user()->username;
                  $input['status'] = 'Belum dibayar';
                  $input['ongkir'] = $this->get_ongkir_by_id($id_kota);
                  $input['total_harga'] = integer_format(Cart::total()); // bawaan dari cartnya string, jadi harus dirubah integer

                  // Transaksi hanya butuh data, id, username, status, ongkir, totalharga
                  $transaksi = Transaksi::create($input);

                  $alamat = new Alamat($input['alamat']);
                  $transaksi->alamat()->save($alamat); //input data ke tabel alamat one to one relation

                  foreach ($dataProdukTransaksi['id_produk'] as $key => $data) {
                      $transaksi->produk()->attach($dataProdukTransaksi['id_produk'][$key], $dataProdukTransaksi['detail'][$key]);
                  }
                  Cart::destroy();
                  return redirect('dashboard/transaksi?id='.$input['id'])->with('flash_message', 'Transaksi Berhasil disimpan')
                                                                          ->with('alert-class', 'alert-success');
              }
                else
              {
                  return redirect('cart')->with('flash_message', 'Alamat tujuan pengiriman tidak ditemukan!')
                                        ->with('alert-class', 'alert-danger');
              }
          }
            else
          {
              return redirect('cart')->with('flash_message', 'Keranjangmu Kosong, pilih barangmu yang akan dibeli lalu masukkan kedalam keranjang dan lanjutkan transaksi !')
                                     ->with('alert-class', 'alert-danger');
          }
    }


    public function detail(Request $request)
    {
          $id = $request->id;
          $Transaksi = Transaksi::find($id);
          return ['alamat' => $Transaksi->alamat, 'produk' => $Transaksi->produk ];
    }

    public function update_status(Request $request)
    {
          $id = $request->id;
          $newStatus = $request->newStatus;

          if($newStatus == 'Sudah dibayar'){
                $newStatus = 'Sedang dikirim';
          }else if($newStatus){
                $newStatus = 'Transaksi Selesai';
          }

          $Transaksi = Transaksi::find($id);

          if($Transaksi){
              $Transaksi->status = $newStatus;
              $Transaksi->admin = \Auth::guard('admin')->user()->username;
              $Transaksi->save();
              return ['response'=> 200, 'status' => $newStatus];
          }else{
              return ['response'=> 500, 'status' => $newStatus];
          }
    }

    public function test(){
      $response = Cart::content()->toJson(JSON_PRETTY_PRINT);
      echo "<pre>";
      return $response;
      echo "</pre>";

    }
}
