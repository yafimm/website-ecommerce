<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KategoriRequest extends FormRequest
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
        $nama_kategori = 'required|string|max:50|min:3|unique:kategori';
        $logo = 'required|image|max:1024|mimes:jpeg,jpg,bmp,png';
      }else{
        $nama_kategori = 'required|string|min:5|max:50|unique:kategori,nama_kategori,'.$this->get('id');
        $logo = 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png';
      }
      return [
        'logo' => $logo,
        'name' => $nama_kategori,
      ];
    }
}
