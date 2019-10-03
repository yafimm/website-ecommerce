<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      if($this->method == 'POST'){
        $nama => 'required|string|max:30|unique:produk',
        $gambar1 => 'required|image|max:1024|mimes:jpeg,jpg,bmp,png'
      }else{
        $nama => 'required|string|max:30|unique:produk, nama,'.$this->get('id'),
        $gambar1 => 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png'
      }
      return [
        'nama' => $nama,
        'gambar1' => $gambar1,
        'harga' => 'required|integer',
        'id_kategori' => 'required',
        'stok' => 'required|integer',
        'deskripsi' => 'sometimes|string|max:1000',
        'gambar1' => 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png'
      ];
    }
}
