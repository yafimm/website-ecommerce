<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{


    private function uploadGambar(Request $request)
    {
        $foto = $request->file('foto_produk');
        $ext = $foto->getClientOriginalExtension();
        $nama = Str::slug($request->nama, '-');;
        if($request->file('foto_produk')->isValid()){
            $filename = $nama.$ext;
            $upload_path = 'images/produk';
            $request->file('foto_produk')->move($upload_path, $filename);
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
        $all_produk = Produk::simplePaginate(20);
        return view('produk.index');
    }

    public function index_produk()
    {
        $all_produk = Produk::orderBy('stok')->simplePaginate(20);
        return view('produk.index_produk');
    }

    public function create()
    {
        $produk = new Produk;
        return view('produk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug']= Str::slug($request->nama, "-");

        if($request->hasFile('gambar1')){
          $input['gambar1'] = $this->uploadFoto($request);
        }

        $create = Produk::create($input);
        if($create)
        {
            return redirect()->name('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil diinput');
        }
        return redirect()->name('produk.index')->with('alert-class', 'alert-danger')
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
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $input = $request->all();

        // kalo ada perubahan gambar,  gambar lama dihapus
        if(isset($input['gambar1'])){
          $this->hapusFoto($produk);
          $input['gambar1'] = $this->uploadFoto($request);
        }

        $update = $produk->update($input);
        if($update)
        {
            return redirect()->name('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil diubah');
        }
        return redirect()->name('kategori.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal diubah');
    }

    public function destroy(Produk $produk)
    {
        $delete = $produk->delete();
        if($delete)
        {
            return redirect()->name('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil dihapus');
        }
        return redirect()->name('kategori.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal dihapus');
    }

}
