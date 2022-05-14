<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function __construct()
    {
        if (Session::get('user_login') == false) {
            return redirect('login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::getItems('221')->get();
        $totalItems = Item::getItems('221')->count();

        return view('portal.pesanan.index',  compact(
            'items',
            'totalItems'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arrayValidator = array();
        for ($i = 1; $i <= $request->perulangan; $i++) {
            array_push($arrayValidator, "'item_" . $i . "' => 'required'");
        }

        $validator = Validator::make($request->all(), [
            $arrayValidator
        ]);

        if ($validator->fails()) {
            return redirect('/pemesanan')->with('alert', 'Ada kesalahan data, coba lagi.');
        } else {

            $nomorInvoice  = Item::dapatkanNomorInvoiceTerakhir();

            $invoice = item::tambahInvoice($nomorInvoice,  Session::get('pelanggan_id'), '-', $request->alamat_pengantaran);

            $gerai = Item::getGerai('221');

            $arrayItems = $request->all();

            for ($i = 1; $i <= $request->perulangan; $i++) {

                $idMenu = $arrayItems['id_menu_' . $i];

                $jumlahOrder = $arrayItems['jumlah_order_' . $i];

                $menuGerai = Item::getMenuGerai($idMenu);

                Item::tambahOrderMakanan(
                    $invoice,
                    Session::get('pelanggan_id'),
                    $gerai->nama_gerai,
                    $menuGerai->nama_menu,
                    $gerai->alamat_lengkap,
                    $gerai->alamat_lengkap,
                    $request->alamat_pengantaran,
                    $request->alamat_pengantaran,
                    '-',
                    '0',
                    $jumlahOrder,
                    $menuGerai->harga,
                    $idMenu
                );
            }
            return redirect('/pemesanan')->with('status', 'Pesanan berhasil disimpan.');
        }
    }
}
