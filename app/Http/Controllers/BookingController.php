<?php

namespace App\Http\Controllers;

use App\Http\Requests\bookingRequest;
use Illuminate\Http\Request;
use App\Booking;
use App\Tempat;
use Illuminate\Auth\Access\Response;

class BookingController extends Controller
{
    public function indexBooking($tempatId)
    {
        $tempat_all = Tempat::where('status', '=', 'AKTIF')->get();
        $tempat = Tempat::findorFail($tempatId);
        $jam = [
            "10:00 - 11:00",
            "11:00 - 12:00",
            "12:00 - 13:00",
            "13:00 - 14:00",
            "14:00 - 15:00",
            "15:00 - 16:00",
            "16:00 - 17:00",
            "17:00 - 18:00",
            "18:00 - 19:00",
            "19:00 - 20:00",
            "20:00 - 21:00",
            "21:00 - 22:00",
        ];
        return view('argon.pages.booking.index-booking',[
            'tempatAll' => $tempat_all,
            'thatTempat' => $tempat,
            'jam' => $jam,
        ]);

    }

    public function findBooking(Request $request, $tempat)
    {
        $that = Booking::whereDate('tgl_booking', $request->tgl_booking)
                            ->where('tempat_id', '=', $tempat)
                            ->get();

        if (count($that) > 0) {
            return response()->json([
                'data' => $that
            ]);
        }

        return response()->json(['msg' => 'Tidak Ada Booking Pada Tanggal '. $request->tgl_booking], 401);
    }

    public function createBooking($tempat)
    {
        $tempat = Tempat::findOrfail($tempat);
        return view('argon.pages.booking.create', ['thatTempat' => $tempat]);
    }

    public function storeBooking(bookingRequest $request, $tempat)
    {
        $tempat = Tempat::where('id', '=', $tempat)->first();
        if (!$tempat) {
            return response()->json(['msg' => "Terjadi Kesalaha dengan Tempat Booking"], 401);
        }

        $jam = Booking::where('tempat_id', '=', $request->tempat_id)->where('jam','=', $request->jam)->first();
        if (!$jam) {
            return response()->json(['msg' => "Terjadi Kesalaha dengan Waktu Booking"], 401);
        }

        $booking = Booking::create([
            'tempat_id' => $request->tempat_id,
            'user_id' => $request->user_id,
            'nama_booking' => $request->nama_booking,
            'jam' => $request->jam,
            'status' => $request->status,
            'tgl_booking' => $request->tgl_booking,
        ]);

        return Response()->json(['msg' => "Booking Tempat ". $booking->tempat->name . " Pada Jam ". $request->jam]);


    }
}
