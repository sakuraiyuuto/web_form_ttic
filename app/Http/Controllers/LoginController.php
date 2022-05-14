<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        Session::put('user_login', false);
        return view('portal.login.index');
    }

    public function authentication(Request $request)
    {
        if (Pelanggan::cekUID($request->uid) != 1) {
            $idPelanggan = Pelanggan::tambahPelanggan(
                $request->displayName,
                $request->uid,
                $request->email,
                '',
                '',
                '',
                '',
                date('Y-m-d h:i:s'),
                '1',
                '',
                '',
                null,
                $request->uid,
                null,
                'GOOGLE FCM',
                '',
                $request->photoURL,
            );

            $pelanggan = Pelanggan::dapatkanDataPelangganId($idPelanggan);
        } else {
            $pelanggan = Pelanggan::dapatkanDataPelangganUID($request->uid);
        }

        Session::put('pelanggan_id', $pelanggan->id_pelanggan);
        Session::put('user_login', true);

        return true;
    }
}
