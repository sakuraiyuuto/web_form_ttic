@extends('portal/layout/main')

@section('title', 'Pesanan')

@section('container')
    <div class="content-wrapper col-12" style="width:100%;padding-left:0;margin-left:0;padding-top:20px">
        <!-- Content Header (Page header) -->

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
                <form action="{{ url('/') }}" id="regForm" class="from-prevent-multiple-submits" method="POST">
                    @csrf

                    <div class="card">
                        <div class="tab">
                            <div class="card-header">
                                <h3 class="card-title">SYARAT DAN KETENTUAN</h3>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="card-body">
                                        <h2>Syarat Dan Ketentuan</h2>
                                        <p>1. Pemesanan/Order mulai dibuka pada tanggal 26 Januari 2022 mulai dari pukul
                                            07.00 - 14.00.
                                        </p>
                                        <p>2. Pemesanan/Order hanya dapat dilakukan dengan menggunakan formulir online ini.
                                        </p>
                                        <p>3. Pengantaran barang pesanan dilakukan pada tanggal 26 Januari 2022 mulai pukul
                                            07.00 - 22.00, jika pengantaran di tanggal tersebut belum selesai, maka
                                            pengantaran dilanjutkan pada tanggal 27 Januari 2022 mulai pukul 07.00 - 22.00.
                                        </p>
                                        <p>4. Pemesanan hanya dapat dilakukan untuk 1 nama dengan 1 alamat antar yang sama.
                                            Pemesanan melebihi batas tersebut tidak akan diproses.</p>
                                        <input type="checkbox" id="persetujuan" name="persetujuan" value="Setuju" required>
                                        <label for="persetujuan"> Dengan ini saya menyetujui syarat dan ketentuan diatas
                                            *</label><br>
                                        <p class="mt-5">*Wajib diisi.</p>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab">
                            <div class="card-header">
                                <h3 class="card-title">IDENTITAS PEMESAN</h3>
                            </div>

                            <div class="row">

                                <div class="col-12">
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <p>Mohon untuk mengisi identitas diri anda sebelum melakukan pemesanan.
                                        </p>
                                        <div class="form-group mt-2">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control mt-0" id="nama" name="nama"
                                                maxlength="50" required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="nomor_telepon">Nomor HP</label>
                                            <input type="number" class="form-control mt-0" id="nomor_telepon"
                                                name="nomor_telepon" maxlength="20" required>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="alamat_pengantaran">Alamat Pengantaran</label>
                                            <input type="text" class="form-control mt-0" id="alamat_pengantaran"
                                                name="alamat_pengantaran" maxlength="255" required>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab">
                            <div class="card-header">
                                <h3 class="card-title">RINCIAN PESANAN</h3>
                            </div>

                            <div class="row">

                                <div class="col-12">

                                    <div class="card-body">
                                        <?php
                                        $perulangan = 0;
                                        ?>
                                        @foreach ($items as $item)
                                            <?php
                                            $perulangan++;
                                            ?>
                                            <div class="form-group mt-2">
                                                <label for="kode_item">{{ $item->nama_menu }}
                                                    (Rp{{ number_format($item->harga) }} /
                                                    {{ $item->satuan }})</label><br>
                                                <input type="hidden" value="{{ $item->id_menu }}"
                                                    name="id_menu_{{ $perulangan }}">
                                                <select name="jumlah_order_{{ $perulangan }}" class="form-control mt-0"
                                                    required required>
                                                    @if ($item->min_order > $item->max_order)
                                                        <option value="0" selected>Tidak Membeli</option>
                                                        @for ($i = $item->max_order; $i <= $item->min_order; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    @else
                                                        <option value="0" selected>Tidak Membeli</option>
                                                        @for ($i = $item->min_order; $i <= $item->max_order; $i++)
                                                            <option value="{{ $i }}">{{ $i }}
                                                            </option>
                                                        @endfor
                                                    @endif

                                                </select>
                                            </div>
                                        @endforeach
                                        <input type="hidden" value="{{ $perulangan }}" name="perulangan">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div style="overflow:auto;">
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" id="prevBtn"
                                    onclick="nextPrev(-1)">Sebelumnya</button>
                                <button type="button" class="btn btn-success" id="nextBtn"
                                    onclick="nextPrev(1)">Selanjutnya</button>
                            </div>
                        </div>

                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;margin-bottom:20px">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-messaging.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.2.0/firebase-auth.js"></script>

    <script>
        // Your web app's Firebase configuration

        var firebaseConfig = {
            apiKey: "AIzaSyAW1bgJaX_7CTO9he3ejMyHSpEoI6E8D9s",
            authDomain: "bujang-kurir.firebaseapp.com",
            databaseURL: "https://bujang-kurir.firebaseio.com",
            projectId: "bujang-kurir",
            storageBucket: "bujang-kurir.appspot.com",
            messagingSenderId: "611051476507",
            appId: "1:611051476507:web:70bbb981fac3781e6dcabe"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

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
                document.getElementById("nextBtn").innerHTML = "Simpan";
            } else {
                document.getElementById("nextBtn").innerHTML = "Selanjutnya";
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
                if (y[i].type == 'checkbox') {
                    if (y[i].checked) {
                        y[i].className += " valid";
                    } else {
                        y[i].className += " invalid";
                        valid = false;
                    }
                } else {
                    if (y[i].value == "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false
                        valid = false;
                    }
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
        var $formAdd = $("#regForm");
        $formAdd.submit(function() {
            $formAdd.submit(function() {
                return false;
            });
        });
    </script>

    <script type="text/javascript">
        (function() {
            $('.from-prevent-multiple-submits').on('submit', function() {
                $('.from-prevent-multiple-submits').attr('disabled', 'true');
            })
        })();
    </script>

    <script>
        function logOut() {
            firebase.auth().signOut().then(() => {
                $(location).attr('href', "{{ url('/') }}");
            }).catch((error) => {
                // An error happened.
            });
        }
    </script>
@endsection
