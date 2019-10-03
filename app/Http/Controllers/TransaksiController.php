<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\Rajaongkir;
use Cart;
use App\Http\Requests\TransaksiRequest;
use App\Transaksi;
use App\User;

class TransaksiController extends Controller
{
    public function __construct()
    {
          $this->middleware('checkout', ['only' => ['create']]);
    }

    protected function detailTransaksi($user, $id)
    {
          $transaksi = Transaksi::find($id);
          if($transaksi)
          {
              $transaksi_produk = $transaksi->produk;
              $transaksi = $user->transaksi->find($id);
              if($transaksi){
                  return view('transaksi.show_user', compact('transaksi', 'transaksi_produk'));
              }
          }
          return abort(404);
    }

    private function set_alamat_tujuan($id, $alamat_detail){
          $rajaongkir = new Rajaongkir('0b66d0686246de09238dc70b8d026ec2', Rajaongkir::ACCOUNT_STARTER);
          $alamat = $rajaongkir->getCity($id); //untuk sementara tujuan hanya sampai kota, karena pake rajaongkir yang free;
          if($alamat){
              return ['kodepos' => $alamat['postal_code'],
                      'kota' => $alamat['type']." ".$alamat['city_name'],
                      'provinsi' => $alamat['province'],
                      'alamat' => $alamat_detail];
          }else{
              return false;
          }
    }

    private function get_ongkir_by_id($id)
    {
          $rajaongkir = new Rajaongkir('0b66d0686246de09238dc70b8d026ec2', Rajaongkir::ACCOUNT_STARTER);
          $berat = 500; //ini angka dummy dulu
          $kurir = 'jne';
          $kota_tujuan_id = $id;
          $kota_asal_id = 23; //ceritanya tokonya dibandung, id kota bandung = 23
          $list_biaya = $rajaongkir->getCost(['city' => $kota_asal_id], ['city' => $kota_tujuan_id], $berat, $kurir);
          return $list_biaya['costs'][0]['cost'][0]['value']; //return gini sengaja karena cuma mau ngambil value integernya aja
    }


    //fungsi ini ngambil data detail transaksi dari cart
    private function data_detail_transaksi()
    {
           $harga = $jumlah = $id_produk = $dataProdukTransaksi = array();
           $all_data = Cart::getContent(); // ngambil semua data cart dari class Cart

          if($all_data->count() > 0){
              foreach ($all_data as $key => $data) {
                array_push($id_produk, $data->id);
                array_push($harga, $data->price);
                array_push($jumlah, $data->quantity);
              }

              //Fungsi biar array jadi "nama" => nilai , soalnya data ini digunakan untuk attach ke tabel relasinya
              $harga = Yaf_give_indexArr("harga", $harga);
              $jumlah = Yaf_give_indexArr("jumlah", $jumlah);

              // kombinasi dari semua array jadi satu array sesuai dengan indexnya
              foreach($id_produk as $key=>$val){ // Loop though one array
                $dataProdukTransaksi['detail'][$key] =  $harga[$key] + $jumlah[$key];
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
          $all_transaksi = User::find(\Auth::user()->id)->transaksi()->orderBy('status', 'desc')->Paginate(6);

          // if yang ini untuk menampilkan detailnya
          if($all_transaksi && \Auth::check())
          {
            if(isset($request->id))
            {
                  return $this->detailTransaksi(\Auth::user(), $request->id);
            }
            else
            {
                  return view('transaksi.index_user', compact('all_transaksi'));
            }
          }
          return abort(404);
    }

    public function record_transaksi()
    {
          $all_transaksi = Transaksi::where('status', 'Transaksi Selesai')->simplePaginate(20);
          return view('transaksi.record_transaksi', compact('all_transaksi'));
    }

    public function store(TransaksiRequest $request)
    {

          $dataProdukTransaksi = $this->data_detail_transaksi();
          if($dataProdukTransaksi)
          {
              $input = $request->all();
              $id_kota = $input['city_id'];
              $alamat = $this->set_alamat_tujuan($input['city_id'], $input['alamat_detail']);
              if($alamat)
              {
                  $input['id'] = setIdTransaksi();
                  $input['id_user'] = \Auth::user()->id;
                  $input['status'] = 'Unpaid';
                  $input['nama'] = $request->name;
                  $input['ongkir'] = $this->get_ongkir_by_id($id_kota);
                  $input['subtotal'] = integer_format(Cart::getTotal()); // bawaan dari cartnya string, jadi harus dirubah integer
                  $input['kota'] = $alamat['kota'];
                  $input['note'] = $request['note'];
                  $input['no_telp'] = $input['no_telp'];
                  $input['provinsi'] = $alamat['provinsi'];
                  $input['kodepos'] = $alamat['kodepos'];
                  $input['alamat'] = $alamat['alamat'];
                  // Transaksi hanya butuh data, id, username, status, ongkir, totalharga
                  $transaksi = Transaksi::create($input);


                  foreach ($dataProdukTransaksi['id_produk'] as $key => $data) {
                      $transaksi->produk()->attach($dataProdukTransaksi['id_produk'][$key], $dataProdukTransaksi['detail'][$key]);
                  }
                  Cart::clear();
                  return redirect()->route('transaksi.index_user', ['id' => $input['id']])->with('flash_message', 'Transaction successfully made, pay immediately to complete the transaction process')
                                                                          ->with('alert-class', 'alert-success');
                }
                else
                {
                   return redirect()->route('transaksi.create')->with('flash_message', 'Destination not found!!')
                                          ->with('alert-class', 'alert-danger');
                }
            }
            else
            {
                return redirect()->route('transaksi.create')->with('flash_message', 'Your cart is empty, look for your favorite product and add it to the cart')
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

          if($newStatus == 'Unpaid'){
                $newStatus = 'Is being sent';
          }else if($newStatus == 'Is being sent'){
                $newStatus = 'Done';
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
