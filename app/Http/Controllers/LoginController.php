<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('portal/login/index');
    }

    public function authentication(Request $request)
    {
        if (Pelanggan::cekUID($request->uid) != 1) {

            Pelanggan::tambahPelanggan(
                $request->displayName,
                $request->email,
                "-",
                $request->email,
                $request->emailVerified,
                $request->photoURL,
                $request->isAnonymous,
                $request->uid,
                $request->providerData,
                date('Y-m-d h:i:s')
            );
        }
    }
}
