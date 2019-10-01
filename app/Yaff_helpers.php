<?php
if(!function_exists('setIdTransaksi')) {
    function setIdTransaksi() {
        $id = 'TRS'.date('ymd');
        $lastId = DB::table('transaksi')->where('id','like', $id.'%')->orderBy('id', 'DESC')->first();
        if($lastId){
            $count = substr($lastId->id, 9);
            $count++;

            if(strlen($count) == 1){
                $count='00'.$count;
            }
            else if(strlen($count) == 2){
                $count='0'.$count;
            }
            else{
                $count = $count;
            }

            if($count)
                $id .= $count;
            }else{
                $id .= '001';
            }
        return $id;
    }
}

if(!function_exists('integer_format')) {
    function integer_format($data) {
        $data = str_replace( ',', '', $data);
        $data = str_replace('.', ',', $data);
        return (int)$data;
    }
}

if(!function_exists('helper_money_format')) {
    function helper_money_format($data) {
        return number_format($data, 2, ',', '.');
    }
}

// Fungsi ini untuk membuat array("apel", "jeruk")
// menjadi array(["buah"=>"apel"], ["buah" => "jeruk"]) buahnya sesuai $nama
// ini digunakan untuk input data tabel relasi secara serial, attach($array) begitu guys
if(!function_exists('Yaf_give_indexArr')) {
    function Yaf_give_indexArr($nama, $array){
        $data = array_map(function ($item) use ($nama) {
          return [$nama => $item];
        }, $array);
        return $data;
    }
}

if(!function_exists('Yaf_get_harga_produk')) {
  function Yaf_get_harga_produk($arr_id_produk){

      $hargaProduk = array();

      foreach ($arr_id_produk as $key => $id_produk) {
        $produk = App\Produk::find($id_produk);
        $hargaProduk[$key] = $produk->harga;
      }

      return $hargaProduk;
  }
}

if(!function_exists('yaff_combineAddress')) {
    function yaff_combineAddress($objAlamat){
        $alamat = $objAlamat->alamat_detail.", ".$objAlamat->kota.", ".$objAlamat->provinsi;
        return $alamat;
    }
}

if(!function_exists('yaff_bulan')) {
    function yaff_bulan($bulan){
      switch ($bulan) {
          case 1:
              return 'Januari';
              break;
          case 2:
              return 'Februari';
              break;
          case 3:
              return 'Maret';
              break;
          case 4:
              return 'April';
              break;
          case 5:
              return 'Mei';
              break;
          case 6:
              return 'Juni';
              break;
          case 7:
              return 'Juli';
              break;
          case 8:
              return 'Agustus';
              break;
          case 9:
              return 'September';
              break;
          case 10:
              return 'Oktober';
              break;
          case 11:
              return 'November';
              break;
          default:
              return 'Desember';
      }
    }
}
