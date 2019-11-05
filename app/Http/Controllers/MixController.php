<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MixController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $tempat = \App\Tempat::all();
        return view('argon.dashboard', [
            'tempat' => $tempat
        ]);
    }
}
