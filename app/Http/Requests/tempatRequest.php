<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class tempatRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->isMethod('POST')) {
            return [
                'name' => 'required',
                'lebar' => 'required|min:1',
                'panjang' => 'required|min:1',
            ];
        }else{
            return [
                'name' => 'required',
                'lebar' => 'required|min:1',
                'panjang' => 'required|min:1',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Harus Di Isi',
            'lebar.required' => 'Lebar Harus Di Isi',
            'panjang.required' => 'Panjang Harus Di Isi',
            'panjang.min' => 'Panjang Minimal 1(m)',
            'lebar.min' => 'Lebar Minimal 1(m)',
        ];
    }
}
