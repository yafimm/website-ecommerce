<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KonfirmasiRequest;
use App\Konfirmasi;

class KonfirmasiController extends Controller
{
    private function uploadGambar(Request $request)
    {
        $foto = $request->file('bukti');
        $ext = $foto->getClientOriginalExtension();
        $nama = uniqid('img_');
        if($request->file('bukti')->isValid()){
            $filename = $nama.'.'.$ext;
            $upload_path = 'images/bukti';
            $request->file('bukti')->move($upload_path, $filename);
            return $filename;
        }
        return false;
    }

    private function hapusGambar(Produk $produk)
    {
        $exist = Storage::disk('foto_produk')->exists($produk->gambar1);
        if(isset($produk->gambar1) && $exist){
            $delete = Storage::disk('foto_produk')->delete($produk->gambar1);
            return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
        }
    }

    public function index()
    {
        $all_konfirmasi = Konfirmasi::orderBy('created_at', 'desc')->orderBy('status', 'desc')->simplePaginate(20);
        return view('konfirmasi.index', compact('all_konfirmasi'));
    }

    public function index_user()
    {
        $all_konfirmasi = Konfirmasi::where('id_user','=', \Auth::user()->id)->orderBy('created_at', 'desc')->orderBy('status', 'desc')->simplePaginate(20);
        if($all_konfirmasi)
        {
            return view('konfirmasi.index_user', compact('all_konfirmasi'));
        }
        return abort(404);
    }


    public function create()
    {
        return view('konfirmasi.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if($request->has('bukti'))
        {
            $input['bukti'] = $this->uploadGambar($request);
        }
        $input['id_user'] = \Auth::user()->id;
        $input['status'] = "Open";
        // dd($input);
        $store = Konfirmasi::create($input);
        if($store)
        {
            return redirect()->route('konfirmasi.index')->with('alert-class', 'alert-success')
                                                  ->with('flash_message', 'Ticket successfully created');
        }
        return redirect()->route('konfirmasi.index')->with('alert-class', 'alert-danger')
                                              ->with('flash_message', 'Ticket failed to create');

    }

    public function show($id)
    {
        $konfirmasi = Konfirmasi::find($id);
        if($konfirmasi->id_user == \Auth::user()->id)
        {
            return view('konfirmasi.show');
        }
        return abort(404);
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update($id)
    {
        $konfirmasi = Konfirmasi::find($id);
        if($konfirmasi)
        {
            $update = $konfirmasi->update(['status' => 'Closed']);
            if($update)
            {
                return redirect()->route('konfirmasi.index')->with('alert-class', 'alert-success')
                                                            ->with('flash_message', 'Ticket successfully closed');
            }
            return redirect()->route('konfirmasi.index')->with('alert-class', 'alert-danger')
                                                          ->with('flash_message', 'Ticket failed to closed');

        }
        return abort(404);
    }


}
