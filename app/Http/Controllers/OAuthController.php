<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class OAuthController extends Controller
{
    public function postRegister(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'password|confirmed'
        // ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => $request->email,
        // ]);
        // return 'a';


    }
}
