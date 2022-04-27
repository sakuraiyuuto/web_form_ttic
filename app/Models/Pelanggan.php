<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;

    public static function tambahPelanggan(
        $name,
        $email,
        $password,
        $username,
        $emailVerified,
        $photoUrl,
        $isAnonymous,
        $uId,
        $providerData,
        $dateTimeCreated
    ) {
        $pelanggan =  DB::table('tbl_admin_gerai')->insertGetId([
            'nama' => $name,
            'email' => $email,
            'password' => $password,
            'username' => $username,
            'emailverified' => $emailVerified,
            'photourl' => $photoUrl,
            'isanonymous' => $isAnonymous,
            'uid' => $uId,
            'providerdata' => $providerData,
            'datetime_created' => $dateTimeCreated,
        ]);

        return $pelanggan;
    }

    public static function cekUID($uid)
    {
        $jumlahUid = DB::table('tbl_admin_gerai')->where('uid', '=', $uid)->count();

        return $jumlahUid;
    }
}
