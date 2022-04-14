@extends('portal/layout/main')

@section('title', 'Pesanan')

@section('container')
<div class="content-wrapper col-12" style="width:100%;padding-left:0;margin-left:0;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesanan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Alert Status -->
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    @if (session('alert'))
    <div class="alert alert-danger">
        {{ session('alert') }}
    </div>
    @endif
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form id="regForm" class="from-prevent-multiple-submits" action="{{ url('admin/sejarah/update') }}"
                method="POST">
                @method('patch')
                @csrf
                <div class="tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">WEB FORM TTIC</h3>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <img src="{{ url('images/welcome.jpg') }}" style="width:100%;">
                                    <input type="hidden" value="kontol" placeholder="First name..."
                                        oninput="this.className = ''" name="fname"></p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="h1">assadasdasd</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">SYARAT DAN KETENTUAN</h3>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <H3>1. Pemesanan/Order mulai dibuka pada tanggal 26 Januari 2022 mulai dari pukul
                                        07.00 - 14.00</H3>
                                    <H3>2. Pemesanan/Order hanya dapat dilakukan dengan menggunakan link goggle form ini
                                    </H3>
                                    <H3>3. Pengantaran barang pesanan dilakukan pada tanggal 26 Januari 2022 mulai pukul
                                        07.00 - 22.00, jika pengantaran di tanggal tersebut belum selesai, maka
                                        pengantaran dilanjutkan pada tanggal 27 Januari 2022 mulai pukul 07.00 - 22.00
                                    </H3>
                                    <H3>4. Pemesanan hanya dapat dilakukan untuk 1 Nama dengan 1 Alamat Antar yang sama.
                                        Pemesanan melebihi batas tersebut tidak akan diproses</H3>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card-body">
                                    <img src="{{ url('images/welcome.jpg') }}" style="width:100%;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">IDENTITAS PEMESAN</h3>
                        </div>

                        <div class="row">

                            <div class="col-6">
                                <div class="card-body">
                                    <img src="{{ url('images/3.jpg') }}"
                                        style="width:100%;height:100px;object-fit:cover;">
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- /.card-header -->
                                <div class="card-body">

                                    <div class="form-group mt-2">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control mt-0" id="nama" name="nama"
                                            maxlength="50" required>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="nomor_telepon">Nomor HP</label>
                                        <input type="text" class="form-control mt-0" id="nomor_telepon"
                                            name="nomor_telepon" maxlength="50" required>
                                    </div>

                                    <div class="form-group mt-2">
                                        <label for="alamat_pengantaran">Alamat Pengantaran</label>
                                        <input type="text" class="form-control mt-0" id="alamat_pengantaran"
                                            name="alamat_pengantaran" maxlength="50" required>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">RINCIAN PESANAN</h3>
                        </div>

                        <div class="row">

                            <div class="col-6">

                                <div class="card-body">
                                    @foreach($items as $item)
                                    <div class="form-group mt-2">
                                        <label for="kode_item">{{$item->nama_menu}}</label><br>
                                        <select id="change_data_tambah" name="kode_item" class="form-control mt-0"
                                            required>
                                            <option disabled selected value="">Pilih Kode Item</option>
                                            @foreach($item->min_order to $item->max_order)
                                            <?php
                                            $order = $min_order;
                                            ?>
                                            <option value="OPTION 1">{{$order}}</option>
                                        </select>
                                    </div>

                                    @endforeach
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card-body">
                                    <img src="{{ url('images/welcome.jpg') }}" style="width:100%;">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                

                



                <div style="overflow:auto;">
                    <div class="text-center">
                        <button type="button" class="btn btn-secondary" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" class="btn btn-success" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>

                <!-- Circles which indicates the steps of the form: -->
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </form>
        </div>
    </section>
</div>

<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
        // This function will display the specified tab of the form...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "block";
        //... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").innerHTML = "Submit";
        } else {
            document.getElementById("nextBtn").innerHTML = "Next";
        }
        //... and run a function that will display the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form...
        if (currentTab >= x.length) {
            // ... the form gets submitted:
            document.getElementById("regForm").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class on the current step:
        x[n].className += " active";
    }
</script>

<script type="text/javascript">
    var $formAdd = $("#formAdd");
    $formAdd.submit(function () {
        $formAdd.submit(function () {
            return false;
        });
    });
</script>

<script type="text/javascript">
    var $formEdit = $("#formEdit");
    $formEdit.submit(function () {
        $formEdit.submit(function () {
            return false;
        });
    });
</script>

<script type="text/javascript">
    (function () {
        $('.from-prevent-multiple-submits').on('submit', function () {
            $('.from-prevent-multiple-submits').attr('disabled', 'true');
        })
    })();
</script>
@endsection
