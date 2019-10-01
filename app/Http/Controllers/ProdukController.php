<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;

class ProdukController extends Controller
{

    public function index()
    {
        $all_produk = Produk::simplePaginate(20);
        return view('produk.index');
    }

    public function create()
    {
        $produk = new Produk;
        return view('produk.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $craete = Produk::create($input);
        if($create)
        {
            return redirect()->name('produk.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data produk berhasil diinput');
        }
        return redirect()->name('produk.index')->with('alert-class', 'alert-danger')
                    ->with('flash_message', 'Data produk gagal diinput');
    }

    public function show($slug)
    {
        $produk = Produk::where('slug', '=', $slug)->get();
        if($produk){
            return view('produk.show', compact('produk'));
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
