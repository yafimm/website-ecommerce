<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransaksiRequest extends FormRequest
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
        return [
          'id' => 'require|string',
          'name' => 'required|string|min:4|max:100',
          'city_id' => 'required',
          'administrative' =>'required',
          'note' => 'sometimes|string',
           'no_telp' => 'required|numeric|regex:/(0)/',
           'postalcode' => 'required|string|size:5',
           'alamat_detail' => 'required|string|min:5|max:100'
        ];
    }
}
