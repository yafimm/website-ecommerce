<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use App\Kategori;
use Illuminate\Support\Str;
use Storage;


class KategoriController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    private function uploadGambar(Request $request)
    {
        $foto = $request->file('logo');
        $ext = $foto->getClientOriginalExtension();
        $nama = Str::slug($request->nama, '-');
        if($request->file('logo')->isValid()){
            $filename = $nama.'.'.$ext;
            $upload_path = 'images/logo';
            $request->file('logo')->move($upload_path, $filename);
            return $filename;
        }
        return false;
    }

    private function hapusGambar(Produk $produk)
    {
        $exist = Storage::disk('logo')->exists($produk->gambar1);
        if(isset($produk->gambar1) && $exist){
            $delete = Storage::disk('logo')->delete($produk->gambar1);
            return $delete; //Kalo delete gagal, bakal return false, kalo berhasil bakal return true
        }
    }

    public function index_user()
    {
        $all_kategori = Kategori::all();
        return view('kategori.index_user', compact('all_kategori'));
    }

    public function index()
    {
        $all_kategori = Kategori::orderBy('id','desc')->simplePaginate(15);
        return view('kategori.index', compact('all_kategori'));
    }

    public function create()
    {
        $kategori = new Kategori;
        return view('kategori.create', compact('kategori'));
    }

    public function store(KategoriRequest $request)
    {
        $input = $request->all();
        $input['nama_kategori'] = $request->name;
        $input['slug'] = Str::slug($request->name, '-');
        if($request->has('logo')){
            $input['logo'] = $this->uploadGambar($request);
        }
        $store = Kategori::create($input);
        if($store)
        {
            return redirect()->route('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil diinput');
        }
        return redirect()->route('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil diinput');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Kategori $kategori, KategoriRequest $request)
    {
        $input = $request->all();
        if($request->has('logo')){
            $this->hapusGambar($request, $kategori);
            $input['logo'] = $this->uploadGambar($request);
        }
        $input['slug'] = Str::slug($request->nama,'-');
        $update = $kategori->update($input);
        if($update)
        {
            return redirect()->route('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil diubah');
        }
        return redirect()->route('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $delete = $kategori->delete();
        if($delete)
        {
            return redirect()->route('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil dihapus');
        }
        return view()->name('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil dihapus');

    }
}
