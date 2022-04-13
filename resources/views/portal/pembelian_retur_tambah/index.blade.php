@extends('layout/main')

@section('title', 'Tambah Item Retur')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Item Retur</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{url('pembelian')}}">Pembelian</a> / <a href="{{url('pembelian')}}/{{$nomor_invoice}}">Data Invoice Pembelian</a> / <a href="{{url('pembelian_retur')}}/{{$nomor_invoice}}">Data Retur Pembelian</a> / Tambah Data Item Retur</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <div class="col-12 text-left">
                                <div class="row pl-2">

                                    <div class="button">
                                        <button type="button" class="btn btn-primary mb-3 mr-2" data-toggle="modal"
                                            data-target="#modal-tambah">
                                            <i class="fa fa-plus-circle mr-2" aria-hidden="true"></i>Tambah Item Retur
                                        </button>
                                    </div>

                                </div>


                                <!-- Main content -->
                                <div class="invoice p-3 mb-3">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h4>
                                                RETUR PEMBELIAN
                                            </h4>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            Retur ke
                                            <address>
                                                <strong>{{$supliers->nama_suplier}}</strong><br>
                                                {{$supliers->alamat}}<br>
                                                Telepon : {{$supliers->telepon}}<br>
                                                Email : {{$supliers->email}}
                                            </address>
                                        </div>

                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            &nbsp;
                                            <address>
                                                <strong>&nbsp;</strong><br>
                                                &nbsp;<br>
                                                &nbsp;<br>
                                                &nbsp;<br>
                                                &nbsp;
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>Nomor Retur : </b> {{$nomor_retur}}<br>
                                            <b>Tanggal Retur :</b> {{$tanggal_retur}}<br>
                                            <b>No. Invoice : </b> {{$nomor_invoice}}<br>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-12 table-responsive">
                                            <table id="invoice_pembelian" class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Deskripsi</th>
                                                        <th>Kuantitas Retur</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($pembelianReturItemTambahs as $pembelianReturItemTambah)
                                                    <tr id="{{$pembelianReturItemTambah->id}}">
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$pembelianReturItemTambah->kode_item}} -
                                                            {{$pembelianReturItemTambah->nama_item}}
                                                        </td>
                                                        <td>{{$pembelianReturItemTambah->jumlah_retur}}</td>
                                                        <td>{{($pembelianReturItemTambah->jumlah_invoice)}}</td>
                                                        <td>{{$pembelianReturItemTambah->satuan}}</td>
                                                        <td>
                                                            <div class="row justify-content-center">
                                                                <button type="button"
                                                                    class="btn btn-danger ml-1 open-formModalDelete"
                                                                    data-toggle="modal" data-target="#modal-delete"
                                                                    data-id="{{$pembelianReturItemTambah->id}}"
                                                                    data-kode_item="{{$pembelianReturItemTambah->kode_item}}"
                                                                    data-jumlah_retur="{{$pembelianReturItemTambah->jumlah_retur}}"
                                                                    data-nomor_invoice="{{$nomor_invoice}}">
                                                                    <i class="fa fa-trash mr-2"></i>
                                                                    Hapus
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <form class="user" action="{{route('savePembelianReturItem')}}"
                                                method="POST">
                                                @csrf
                                                <div class="form-body">
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="kode_akun_debit_retur">Kode Akun Jurnal
                                                                    Debit (Retur)</label>
                                                                <select name="kode_akun_debit_retur"
                                                                    class="form-control mt-0" required>
                                                                    @foreach($kodeAkunDebitSelects as
                                                                    $kodeAkunDebitSelect)
                                                                    @if($kodeAkunDebitSelect->nama_akun == "Utang Usaha")
                                                                    <option value="{{$kodeAkunDebitSelect->kode_akun}}" selected>
                                                                        {{$kodeAkunDebitSelect->kode_akun}} -
                                                                        {{$kodeAkunDebitSelect->nama_akun}}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{$kodeAkunDebitSelect->kode_akun}}">
                                                                        {{$kodeAkunDebitSelect->kode_akun}} -
                                                                        {{$kodeAkunDebitSelect->nama_akun}}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="keterangan_debit_retur">Keterangan Debit
                                                                    (Retur)</label>
                                                                <input type="text" class="form-control mt-0"
                                                                    name="keterangan_debit_retur"
                                                                    value="Credit note untuk {{$supliers->nama_suplier}}"
                                                                    maxlength="50" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="kode_akun_kredit_retur">Kode Akun Jurnal
                                                                    Kredit (Retur)</label>
                                                                <select name="kode_akun_kredit_retur"
                                                                    class="form-control mt-0" required>
                                                                    <option disabled selected value="">Pilih Kode Akun
                                                                        Jurnal Kredit</option>
                                                                    @foreach($kodeAkunKreditSelects as
                                                                    $kodeAkunKreditSelect)
                                                                    @if($kodeAkunKreditSelect->nama_akun == "Retur Pembelian")
                                                                    <option value="{{$kodeAkunKreditSelect->kode_akun}}" selected>
                                                                        {{$kodeAkunKreditSelect->kode_akun}} -
                                                                        {{$kodeAkunKreditSelect->nama_akun}}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{$kodeAkunKreditSelect->kode_akun}}">
                                                                        {{$kodeAkunKreditSelect->kode_akun}} -
                                                                        {{$kodeAkunKreditSelect->nama_akun}}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="keterangan_kredit_retur">Keterangan Kredit
                                                                    (Retur)</label>
                                                                <input type="text" class="form-control mt-0"
                                                                    name="keterangan_kredit_retur"
                                                                    value="Retur pembelian barang ke {{$supliers->nama_suplier}}"
                                                                    maxlength="50" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="kode_akun_debit_pengembalian">Kode Akun
                                                                    Jurnal
                                                                    Debit (Pengembalian Uang)</label>
                                                                <select name="kode_akun_debit_pengembalian"
                                                                    class="form-control mt-0" required>
                                                                    @foreach($kodeAkunDebitSelects as
                                                                    $kodeAkunDebitSelect)
                                                                    @if($kodeAkunDebitSelect->nama_akun == "Kas")
                                                                    <option value="{{$kodeAkunDebitSelect->kode_akun}}" selected>
                                                                        {{$kodeAkunDebitSelect->kode_akun}} -
                                                                        {{$kodeAkunDebitSelect->nama_akun}}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{$kodeAkunDebitSelect->kode_akun}}">
                                                                        {{$kodeAkunDebitSelect->kode_akun}} -
                                                                        {{$kodeAkunDebitSelect->nama_akun}}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="keterangan_debit_pengembalian">Keterangan
                                                                    Debit (Pengembalian Uang)</label>
                                                                <input type="text" class="form-control mt-0"
                                                                    name="keterangan_debit_pengembalian"
                                                                    value="Debit pengembalian uang dari {{$supliers->nama_suplier}}"
                                                                    maxlength="50" required>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="kode_akun_kredit_pengembalian">Kode Akun
                                                                    Jurnal
                                                                    Kredit (Pengembalian Uang)</label>
                                                                <select name="kode_akun_kredit_pengembalian"
                                                                    class="form-control mt-0" required>
                                                                    @foreach($kodeAkunKreditSelects as
                                                                    $kodeAkunKreditSelect)
                                                                    @if($kodeAkunKreditSelect->nama_akun == "Utang Usaha")
                                                                    <option value="{{$kodeAkunKreditSelect->kode_akun}}" selected>
                                                                        {{$kodeAkunKreditSelect->kode_akun}} -
                                                                        {{$kodeAkunKreditSelect->nama_akun}}
                                                                    </option>
                                                                    @else
                                                                    <option value="{{$kodeAkunKreditSelect->kode_akun}}">
                                                                        {{$kodeAkunKreditSelect->kode_akun}} -
                                                                        {{$kodeAkunKreditSelect->nama_akun}}
                                                                    </option>
                                                                    @endif
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group mt-2 mr-0 col-6">
                                                                <label for="keterangan_kredit_pengembalian">Keterangan
                                                                    Kredit (Pengembalian Uang)</label>
                                                                <input type="text" class="form-control mt-0"
                                                                    name="keterangan_kredit_pengembalian"
                                                                    value="Kredit pengembalian uang dari {{$supliers->nama_suplier}}"
                                                                    maxlength="50" required>
                                                            </div>

                                                        </div>

                                                        <div class="col-12 justify-content-center text-left mt-3 ml-1">
                                                            <div class="row">
                                                                <input type="hidden" name="nomor_invoice"
                                                                    value="{{$nomor_invoice}}">
                                                                <input type="hidden" name="nomor_retur"
                                                                    value="{{$nomor_retur}}">
                                                                <input type="hidden" name="tanggal_retur"
                                                                    value="{{$tanggal_retur}}">
                                                                <input type="hidden" name="nama_suplier"
                                                                    value="{{$supliers->nama_suplier}}">
                                                                @foreach($pembelianReturItemTambahs as
                                                                $pembelianReturItemTambah)
                                                                @if(($pembelianReturItemTambah->nomor_retur) ==
                                                                $nomor_retur)
                                                                <input type="hidden" name="id[]"
                                                                    value="{{$loop->iteration}}">
                                                                <input type="hidden" name="kode_item[]"
                                                                    value="{{$pembelianReturItemTambah->kode_item}}">
                                                                <input type="hidden" name="jumlah_retur[]"
                                                                    value="{{$pembelianReturItemTambah->jumlah_retur}}">
                                                                @endif
                                                                @endforeach
                                                                <button type="submit" class="btn btn-primary mb-3 mr-3"
                                                                    {{$button}}>
                                                                    <i class="fa fa-save mr-2"></i>Simpan Retur
                                                                </button>

                                            </form>
                                            <button type="button" data-toggle="modal" data-target="#modal-batal-retur"
                                                class="btn btn-secondary mb-3 mr-3 open-formModalBatalRetur"
                                                data-nomor_retur="{{$nomor_retur}}">
                                                <i class="fa fa-trash mr-2"></i>Batalkan Retur
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Item Retur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pembelian_store_retur_item')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="nomor_retur" value="{{$nomor_retur}}">

                    <input type="hidden" name="nomor_invoice" value="{{$nomor_invoice}}">

                    <input type="hidden" class="form-control mt-0" id="id_item" name="id_item">

                    <div class="form-group mt-2">
                        <label for="kode_item">Kode Item</label><br>
                        <select name="kode_item" id="change_data_tambah" style="width: 100%;border:none;" class="form-control mt-0" required>
                            <option disabled selected value="">Pilih Kode Item</option>
                            @foreach($pembelianItems as $pembelianItemOption)
                            <option value="{{$pembelianItemOption->kode_item}}"
                                data-id_item="{{$pembelianItemOption->id}}"
                                data-kode_item="{{$pembelianItemOption->kode_item}}"
                                data-nama_item="{{$pembelianItemOption->nama_item}}"
                                data-harga="{{$pembelianItemOption->harga_beli}}"
                                data-satuan="{{$pembelianItemOption->satuan}}"
                                data-jumlah_invoice="{{$pembelianItemOption->kuantitas_tersedia}}">
                                {{$pembelianItemOption->kode_item}} - {{$pembelianItemOption->nama_item_singkat}} ({{$pembelianItemOption->nama_item}})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="nama_item">Nama Item</label>
                        <input type="text" class="form-control mt-0" id="nama_item" name="nama_item" maxlength="50"
                            readonly required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="satuan">Satuan</label>
                        <input type="text" class="form-control mt-0" id="satuan" name="satuan" maxlength="50" readonly
                            required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control mt-0" id="harga" name="harga" maxlength="20" readonly
                            required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="jumlah_invoice">Jumlah Pembelian</label>
                        <input type="text" class="form-control mt-0" id="jumlah_invoice" name="jumlah_invoice" maxlength="50" readonly
                            required>
                    </div>

                    <div class="form-group mt-2">
                        <label for="jumlah_retur">Jumlah Retur</label>
                        <input type="number" class="form-control mt-0" id="jumlah_invoice" name="jumlah_retur" required
                            min="1" placeholder="Masukkan Jumlah Retur" required>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Item Retur</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@if(count($pembelianReturItemTambahs) != 0)
<!-- Modal Delete -->
<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Item Retur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('pembelian_retur_tambah')}}/{{$pembelianReturItemTambah->id}}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="id" id="id">

                    <input type="hidden" name="jumlah_retur" id="jumlah_retur">

                    <input type="hidden" name="kode_item" id="kode_item">

                    <input type="hidden" name="nomor_invoice" id="nomor_invoice">

                    <p>Apakah anda yakin ingin menghapus item retur?</p>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus Item</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif

@if(count($pembelianReturItemTambahs) != 0)
<!-- Modal Batal Retur -->
<div class="modal fade" id="modal-batal-retur">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Batalkan Retur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="user" action="{{route('deletePembelianReturItem')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="nomor_retur" value="{{$nomor_retur}}">
                    <input type="hidden" name="nomor_invoice" value="{{$nomor_invoice}}">
                    <p>Apakah anda yakin ingin membatalkan retur?</p>

                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-secondary">Batalkan Retur</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endif

@endsection

@section('script')
<script type="text/javascript">
    $(function () {
        var nomor_invoice = $(this).data('nomor_invoice');
        $("#invoice_pembelian").DataTable({
            "responsive": false,
            "lengthChange": false,
            "autoWidth": false,
            "searching": false,
            "order": false,
            "sort": false,
            "paging": false,
            "info": false
        }).buttons().container().appendTo('#invoice_pembelian_wrapper .col-md-6:eq(0)');
    });

    $(document).on("click", ".open-formModalDelete", function () {
        var id = $(this).data('id');
        var jumlah_retur = $(this).data('jumlah_retur');
        var kode_item = $(this).data('kode_item');
        var nomor_invoice = $(this).data('nomor_invoice');

        $(".modal-body #id").val(id);
        $(".modal-body #jumlah_retur").val(jumlah_retur);
        $(".modal-body #kode_item").val(kode_item);
        $(".modal-body #nomor_invoice").val(nomor_invoice);
    });

    $(document).on("click", ".open-formModalBatalRetur", function () {
        var nomor_retur = $(this).data('nomor_retur');
        var nomor_invoice = $(this).data('nomor_invoice');

        $(".modal-body #nomor_retur").val(nomor_retur);
        $(".modal-body #nomor_invoice").val(nomor_invoice);
    });

    $("#change_data_tambah").select2();

    $("#change_data_tambah").change(function () {
        var cntrol = $(this);
        var nama_item = cntrol.find(':selected').data('nama_item');
        var satuan = cntrol.find(':selected').data("satuan");
        var harga = cntrol.find(':selected').data("harga");
        var id_item = cntrol.find(':selected').data('id_item');
        var jumlah_invoice = cntrol.find(':selected').data('jumlah_invoice');

        $('#nama_item').val(nama_item);
        $('#satuan').val(satuan);
        $('#harga').val(harga);
        $('#id_item').val(id_item);
        $('#jumlah_invoice').val(jumlah_invoice);
    });

    @if(session('status'))
    $(document).ready(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: 'success',
            title: '<div class="ml-2">{{session(status)}}</div>'
        })
    });
    @endif

    @if(session('alert'))
    $(document).ready(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: 'error',
            title: '<div class="ml-2">{{session(alert)}}</div>'
        })
    });
    @endif

    @if(session('notif'))
    $(document).ready(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        Toast.fire({
            icon: 'info',
            title: '<div class="ml-2">{{session(notif)}}</div>'
        })
    });
    @endif
</script>
@endsection