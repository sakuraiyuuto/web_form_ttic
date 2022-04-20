<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
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
            return redirect('/')->with('alert', 'Ada kesalahan data, coba lagi.');
        } else {

            $nomorInvoice  = Item::dapatkanNomorInvoiceTerakhir();

            $invoice = item::tambahInvoice($nomorInvoice, '1', '-', $request->alamat_pengantaran);

            $gerai = Item::getGerai('221');

            $arrayItems = $request->all();

            for ($i = 1; $i <= $request->perulangan; $i++) {

                $idMenu = $arrayItems['id_menu_' . $i];

                $jumlahOrder = $arrayItems['jumlah_order_' . $i];

                $menuGerai = Item::getMenuGerai($idMenu);

                Item::tambahOrderMakanan(
                    $invoice,
                    '1',
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
            return redirect('/')->with('status', 'Himpunan Mahasiswa Berhasil Diubah');
        }
    }
}
