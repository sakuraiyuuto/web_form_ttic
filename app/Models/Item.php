<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    public static function getItems($id)
    {
        $items = DB::table('tbl_gerai')
            ->join('tbl_menu_gerai', 'tbl_gerai.id_gerai', '=', 'tbl_menu_gerai.id_gerai')
            ->select(
                'tbl_menu_gerai.id_menu',
                'tbl_menu_gerai.nama_menu',
                'tbl_menu_gerai.link_gambar_menu',
                'tbl_menu_gerai.harga',
                'tbl_menu_gerai.deskripsi_menu',
                'tbl_menu_gerai.satuan',
                'tbl_menu_gerai.min_order',
                'tbl_menu_gerai.max_order'
            )
            ->where('tbl_gerai.id_gerai', '=', $id)
            ->where('tbl_menu_gerai.is_active', '=', '1');

        return $items;
    }

    public static function getGerai($id)
    {
        $gerai = DB::table('tbl_gerai')->where('id_gerai', '=', $id)->first();

        return $gerai;
    }

    public static function dapatkanNomorInvoiceTerakhir()
    {
        $invoiceTerakhir = DB::table('tbl_invoice')
            ->whereBetween('invoice_date', [date('Y-m-d') . ' 00:00:00', date('Y-m-d') . ' 23:59:59'])
            ->orderBy('invoice_date', 'DESC')
            ->first();

        if ($invoiceTerakhir == null) {
            $kodeTerbaru = 'BK' . date('ymd') . '0001';
        } else {
            $nomor_invoice = $invoiceTerakhir->no_invoice;
            $nomorKodeTerakhir = substr($nomor_invoice, 8, 4);

            $angkaKodeTerbaru = intval($nomorKodeTerakhir) + 1;

            $nomorKodeTerbaru = sprintf("%04d", $angkaKodeTerbaru);

            $kodeTerbaru = 'BK' . date('ymd') . $nomorKodeTerbaru;
        }

        return $kodeTerbaru;
    }

    public static function tambahInvoice(
        $nomorInvoice,
        $idPelanggan,
        $catatan,
        $alamatAntar
    ) {
        $invoice = DB::table('tbl_invoice')->insertGetId(
            [
                'no_invoice' => $nomorInvoice,
                'id_pelanggan' => $idPelanggan,
                'id_kurir' => null,
                'invoice_date' => date("Y-m-d h:i:s"),
                'total' => 0,
                'is_finish' => 1,
                'is_confirmed' => 0,
                'is_on_deliver' => 0,
                'is_pick_up' => 0,
                'catatan' => $catatan,
                'detail_alamat_antar' => $alamatAntar
            ]
        );

        return $invoice;
    }

    public static function tambahOrderMakanan(
        $idInvoice,
        $idPelanggan,
        $namaResto,
        $itemOrder,
        $alamatOrder,
        $detailAlamatOrder,
        $alamatAntar,
        $detailAlamat,
        $catatan,
        $tarif,
        $porsiOrder,
        $hargaSatuanOrder,
        $idMenu,
    ) {
        $orderMakanan = DB::table('tbl_order_makanan')->insert(
            [
                'id_invoice' => $idInvoice,
                'id_pelanggan' => $idPelanggan,
                'waktu_order' => date("Y-m-d h:i:s"),
                'nama_resto' => $namaResto,
                'item_order' => $itemOrder,
                'alamat_order' => $alamatOrder,
                'detail_alamat_order' => $detailAlamatOrder,
                'alamat_antar' => $alamatAntar,
                'detail_alamat' => $detailAlamat,
                'catatan' => $catatan,
                'tarif' => $tarif,
                'is_confirmed' => 1,
                'is_pending' => 1,
                'porsi_order' => $porsiOrder,
                'harga_satuan_order' => $hargaSatuanOrder,
                'is_finish' => 0,
                'id_menu' => $idMenu,
                'lat' => null,
                'lng' => null,
            ]
        );

        return $orderMakanan;
    }

    public static function getMenuGerai($id)
    {
        $menuGerai = DB::table('tbl_menu_gerai')->where('id_menu', '=', $id)->first();

        return $menuGerai;
    }
}
