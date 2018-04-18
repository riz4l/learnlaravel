<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class validasitambah extends Request
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
            'nama'=>'required',
            'alamat'=>'required',
            'semester'=>'required',
            'file_photo' => 'mimes:jpeg,jpg,png|required'
        ];
    }

    public function messages()
    {
        return [
            'nama.required'=>'Nama Harus diisi',
            'alamat.required'=>'Alamat Harus diisi',
            'semester.required'=>'Semester Harus diisi',
            'file_photo.mimes'=>'Type Photo harus format jpg/jpeg/png',
        ];
    }
}
