<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Tempat;
class BookingController extends Controller
{
    public function indexBooking($tempatId)
    {
        $tempat_all = Tempat::all();
        $tempat = Tempat::findorFail($tempatId);

        return view('argon.pages.booking.index-booking',[
            'tempat-all' => $tempat_all,
            'thatTempat' => $tempat,
        ]);

    }
}
