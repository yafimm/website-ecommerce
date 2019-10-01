<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kategori;

class KategoriController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $all_kategori = Kategori::simplePaginate(15);
        return view('kategori.index', compact('all_kategori'));
    }

    public function create()
    {
        $kategori = new Kategori;
        return view('kategori.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $data = Kategori::create([
                    'nama_kategori' => $data['nama_kategori'],
                ]);
        if($data)
        {
            return view()->name('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil diinput');
        }
        return view()->name('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil diinput');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Kategori $kategori, Request $request)
    {
        $input = $request->all();
        $update = $kategori->update($input);
        if($update)
        {
            return view()->name('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil diubah');
        }
        return view()->name('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil diubah');
    }

    public function destroy(Kategori $kategori)
    {
        $delete = $kategori->delete();
        if($delete)
        {
            return view()->name('kategori.index')->with('alert-class', 'alert-success')
                        ->with('flash_message', 'Data kategori berhasil dihapus');
        }
        return view()->name('kategori.index')->with('alert-class', 'alert-success')
                    ->with('flash_message', 'Data kategori berhasil dihapus');

    }
}
