<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class prequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (!$this->user()->admin) {
            return false;
        }
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
            'nip' => 'required',
            'nama' => 'required',
            'ttglahir' => 'required',
            'agama' => 'required',
            'jkelamin' => 'required',
            'cover_img' => 'image|mimes:jpeg,jpg,png|max:10240',
            'filepdf' => 'mimes:pdf'

        ];
    }
    public function messages()
    {
        return [
            'nip.required' => 'nip wajib diisi',
            'nama.required' => 'nama wajib diisi',
            'ttglahir.required' => 'tanggal lahir wajib diisi',

            'agama.required' => 'agama wajib diisi',
            'jkelamin.required' => 'jenis kelamin wajib diisi',
            'cover_img.image' => 'gambar harus jpeg, jpg atau png',
            'cover_img.max' => 'gambar berukuran max 10 mb',
            'filepdf' => 'file harus pdf'
        ];
    }
}
