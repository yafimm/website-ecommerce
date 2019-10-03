<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KonfirmasiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'id_user' => 'required',
        'id_admin' => 'sometimes',
        'judul' => 'required|string|min:10|max:100',
        'pesan' => 'required|string|min:10|max:500',
        'bukti' => 'sometimes|image|max:1024|mimes:jpeg,jpg,bmp,png'
      ];
    }
}
