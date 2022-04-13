<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    public static function getItems()
    {
        $informasiTerbaru = DB::table('tbl_gerai')
            ->join('tbl_menu_gerai', 'tbl_gerai.id_gerai', '=', 'tbl_menu_gerai.id_gerai')
            ->select(
                'tbl_menu_gerai.nama_menu',
                'tbl_menu_gerai.link_gambar_menu',
                'tbl_menu_gerai.harga',
                'tbl_menu_gerai.deskripsi_menu',
                'tbl_menu_gerai.satuan',
                'tbl_menu_gerai.min_order',
                'tbl_menu_gerai.max_order'
            )
            ->where('tbl_gerai.id_gerai', '=', '221')
            ->where('tbl_menu_gerai.is_active', '=', '1');

        return $informasiTerbaru;
    }

    public static function tambahPesanan()
    {
        DB::table('users')->insert([
            'email' => 'kayla@example.com',
            'votes' => 0
        ]);

        DB::table('users')->insert([
            'email' => 'kayla@example.com',
            'votes' => 0
        ]);
    }

    public static function dapatkanNomorInvoiceTerakhir()
    {
        date("ymd");
    }
}
