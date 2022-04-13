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
        $items = Item::getItems()->get();
        $totalItems = Item::getItems()->count();

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
        for ($i = 1; $i <= $request->totalItems; $i++) {
            array_push($arrayValidator, "'item_" . $i . "' => 'required'");
        }

        $validator = Validator::make($request->all(), [
            $arrayValidator
        ]);

        if ($validator->fails()) {
            return redirect('/admin/himpunan_mahasiswa')->with('alert', 'Ada kesalahan data, coba lagi.');
        } else {

            for ($i = 1; $i <= $request->totalItems; $i++) {
                Item::tambahPesanan();
            }

            return redirect('/admin/himpunan_mahasiswa')->with('status', 'Himpunan Mahasiswa Berhasil Diubah');
        }
    }
}
