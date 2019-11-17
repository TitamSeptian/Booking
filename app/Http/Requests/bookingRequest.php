<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class bookingRequest extends FormRequest
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
                'tempat_id' => 'required',
                'user_id' => 'required',
                'nama_booking' => 'required|string',
                'jam' => 'required',
                'status' => 'required',
                'tgl_booking' => 'required|date',
            ];
        }else{
            return [
                'tempat_id' => 'required',
                'user_id' => 'required',
                'nama_booking' => 'required|string',
                'jam' => 'required',
                'status' => 'required',
                'tgl_booking' => 'required|date',
            ];
        }
    }

    public function messages()
    {
        return [
            'tempat_id.required' => 'Tempat Kosong',
            'user_id.required' => 'User Tidak Ada',
            'nama_booking.required' => 'Booking harus di isi',
            'nama_booking.string' => 'Format Nama Tidak Valid',
            'jam.required' => 'Jam Kosong',
            'status.required' => 'Status Kosong',
            'tgl_booking.required' => 'Tanggal Booking Kosong',
            'tgl_booking.date' => 'Format Tanggal Tidak Valid',
        ];
    }
}
