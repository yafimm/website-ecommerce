<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\Produk;
use App\Kategori;
use App\Http\Requests\ProdukRequest;

class ProdukController extends Controller
{


    private function uploadGambar(Request $request)
    {
        $foto = $request->file('gambar1');
        $ext = $foto->getClientOriginalExtension();
        $nama = Str::slug($request->nama, '-');
        if($request->file('gambar1')->isValid()){
            $filename = $nama.'.'.$ext;
            $upload_path = 'images/produk';
            $request->file('gambar1')->move($upload_path, $filename);
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
        $all_produk = Produk::orderBy('created_at', 'desc')->simplePaginate(12);
        return view('produk.index', compact('all_produk'));
    }

    public function index_produk()
    {
        $all_produk = Produk::orderBy('stok')->Paginate(20);
        $all_kategori = Kategori::orderBy('nama_kategori','asc')->get();
        return view('produk.daftar-produk', compact('all_produk', 'all_kategori'));
    }

    public function produk_kategori($slug)
    {
        $kategori = Kategori::where('slug', '=', $slug)->first();
        if($kategori)
        {
            $all_produk = Produk::where('id_kategori', '=', $kategori->id)->Paginate(20);
            $all_kategori = Kategori::orderBy('nama_kategori','asc')->get();
            return view('produk.daftar-produk', compact('all_produk', 'all_kategori'));
        }
        return abort(404);
    }

    public function create()
    {
        $produk = new Produk;
        $all_kategori = Kategori::all();
        return view('produk.create', compact('produk', 'all_kategori'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->nama, '-');

        if($request->hasFile('gambar1')){
          $input['gambar1'] = $this->uploadGambar($request);
        }
        //
        // dd($input);
        $create = Produk::create($input);
        if($create)
        {
            return redirect()->route('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil diinput');
        }
        return redirect()->route('produk.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal diinput');
    }

    public function show(Produk $produk)
    {
        return abort(404);
    }

    public function show_produk($slug)
    {
        $produk = Produk::where('slug', '=', $slug)->first();
        if($produk){
            return view('produk.detail-produk', compact('produk'));
        }
        return abort(404);
    }

    public function edit(Produk $produk)
    {
        $all_kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'all_kategori'));
    }

    public function update(ProdukRequest $request, Produk $produk)
    {
        $input = $request->all();

        // kalo ada perubahan gambar,  gambar lama dihapus
        if($request->hasFile('gambar1')){
          $this->hapusFoto($produk);
          $input['gambar1'] = $this->uploadGambar($request);
        }


        $update = $produk->update($input);
        if($update)
        {
            return redirect()->route('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil diubah');
        }
        return redirect()->route('kategori.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal diubah');
    }

    public function destroy(Produk $produk)
    {
        $delete = $produk->delete();
        if($delete)
        {
            return redirect()->route('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil dihapus');
        }
        return redirect()->route('kategori.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal dihapus');
    }

}
