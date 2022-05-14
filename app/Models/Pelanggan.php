<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;

    public static function tambahPelanggan(
        $nama,
        $username,
        $email,
        $telp,
        $alamat,
        $password,
        $hash,
        $createdAt,
        $isVerified,
        $androidToken,
        $firebaseToken,
        $idTarif,
        $uid,
        $tipeLogin,
        $sumberLogin,
        $sumberId,
        $photoUrl
    ) {
        $pelanggan =  DB::table('tbl_pelanggan')->insertGetId([
            'nama' => $nama,
            'username' => $username,
            'email' => $email,
            'telp' => $telp,
            'alamat' => $alamat,
            'password' => $password,
            'hash' => $hash,
            'created_at' => $createdAt,
            'is_verified' => $isVerified,
            'android_token' => $androidToken,
            'firebase_token' => $firebaseToken,
            'id_tarif' => $idTarif,
            'uid' => $uid,
            'tipe_login' => $tipeLogin,
            'sumber_login' => $sumberLogin,
            'sumber_id' => $sumberId,
            'photourl' => $photoUrl
        ]);

        return $pelanggan;
    }

    public static function cekUID($uid)
    {
        $jumlahUid = DB::table('tbl_pelanggan')->where('uid', '=', $uid)->count();

        return $jumlahUid;
    }

    public static function dapatkanDataPelangganUID($uid)
    {
        $pelanggan = DB::table('tbl_pelanggan')->where('uid', '=', $uid)->first();

        return $pelanggan;
    }

    public static function dapatkanDataPelangganId($id)
    {
        $pelanggan = DB::table('tbl_pelanggan')->where('id_pelanggan', '=', $id)->first();

        return $pelanggan;
    }
}
