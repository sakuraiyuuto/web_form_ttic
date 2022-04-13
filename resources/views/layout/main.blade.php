<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('/template/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/template/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('/template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
    <!-- Webicon -->
    <link href="{{url('/images/logo.ico')}}" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <link rel="stylesheet" href="{{url('/template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('beranda')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><b>{{$session_user->name}}</b></span>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('beranda')}}" class="dropdown-item dropdown-footer">
                            <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2"></i>
                            Beranda</a>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{url('logout')}}" class="dropdown-item text-danger dropdown-footer">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                            Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <div>
            <a href="{{url('beranda')}}" class="brand-link">
                <img src="{{url('/images/logo.png')}}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Aplikasi Akuntansi</span>
            </a>
            </div>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{url('/images/user.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{$session_user->name}}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Cari Menu"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2 pb-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{url('beranda')}}" class="nav-link {{set_active(['beranda.index'])}}">
                                <i class="nav-icon fas fa-home "></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>

                        <li class="nav-item {{set_open(['customer.index','supplier.index', 'kode_akun.index', 'item_barang.index', 'item_jasa.index'])}}">
                            <a href="#"
                                class="nav-link {{set_active(['customer.index','supplier.index', 'kode_akun.index', 'item_barang.index', 'item_jasa.index'])}}">
                                <i class="nav-icon fas fa-money-check"></i>
                                <p>
                                    Main
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Customer</small></li>
                                <li class="nav-item">
                                    <a href="{{url('customer')}}" class="nav-link {{set_active(['customer.index'])}}">
                                        <i class="far fa{{set_dot(['customer.index'])}}-circle nav-icon"></i>
                                        <p>Customer</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Supplier</small></li>
                                <li class="nav-item">
                                    <a href="{{url('supplier')}}" class="nav-link {{set_active(['supplier.index'])}}">
                                        <i class="far fa{{set_dot(['supplier.index'])}}-circle nav-icon"></i>
                                        <p>Supplier</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Akun</small></li>
                                <li class="nav-item">
                                    <a href="{{url('kode_akun')}}" class="nav-link {{set_active(['kode_akun.index'])}}">
                                        <i class="far fa{{set_dot(['kode_akun.index'])}}-circle nav-icon"></i>
                                        <p>Kode Akun (COA)</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Barang</small></li>
                                <li class="nav-item">
                                    <a href="{{url('item_barang')}}" class="nav-link {{set_active(['item_barang.index'])}}">
                                        <i class="far fa{{set_dot(['item_barang.index'])}}-circle nav-icon"></i>
                                        <p>Item Barang</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Jasa</small></li>
                                <li class="nav-item">
                                    <a href="{{url('item_jasa')}}" class="nav-link {{set_active(['item_jasa.index'])}}">
                                        <i class="far fa{{set_dot(['item_jasa.index'])}}-circle nav-icon"></i>
                                        <p>Item Jasa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{set_open(['pembelian.index','pembelian.show','pembelian_tambah.index','pembelian_retur.show','pembelian_retur.detail_pembelian_retur','pembelian_retur_tambah.show','detail_pembelian_retur','penjualan.index','penjualan.show','penjualan_tambah.index','penjualan_retur.show','penjualan_retur.detail_penjualan_retur','penjualan_retur_tambah.show','detail_penjualan_retur','jurnal_umum.index','jurnal_umum.show','jurnal_umum_tambah.index'])}}">
                            <a href="#" class="nav-link {{set_active(['pembelian.index','pembelian.show','pembelian_tambah.index','pembelian_retur.show','pembelian_retur_tambah.show','detail_pembelian_retur','penjualan.index','penjualan.show','penjualan_tambah.index','penjualan_retur.show','penjualan_retur.detail_penjualan_retur','penjualan_retur_tambah.show','detail_penjualan_retur', 'jurnal_umum.index','jurnal_umum.show','jurnal_umum_tambah.index'])}}">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>
                                    Transaksi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Uang Keluar</small></li>
                                <li class="nav-item">
                                    <a href="{{url('pembelian')}}" class="nav-link {{set_active(['pembelian.index','pembelian.show','pembelian_tambah.index','pembelian_retur.show','detail_pembelian_retur','pembelian_retur_tambah.show'])}}">
                                        <i class="far fa{{set_dot(['pembelian.index','pembelian.show','pembelian_tambah.index','pembelian_retur.show','detail_pembelian_retur','pembelian_retur_tambah.show'])}}-circle nav-icon"></i>
                                        <p>Pembelian</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Uang Masuk</small></li>
                                <li class="nav-item">
                                    <a href="{{url('penjualan')}}" class="nav-link {{set_active(['penjualan.index','penjualan.show','penjualan_tambah.index','penjualan_retur.show','detail_penjualan_retur','penjualan_retur_tambah.show'])}}">
                                        <i class="far fa{{set_dot(['penjualan.index','penjualan.show','penjualan_tambah.index','penjualan_retur.show','detail_penjualan_retur','penjualan_retur_tambah.show'])}}-circle nav-icon"></i>
                                        <p>Penjualan</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Jurnal</small></li>
                                <li class="nav-item">
                                    <a href="{{url('jurnal_umum')}}" class="nav-link {{set_active(['jurnal_umum.index','jurnal_umum.show','jurnal_umum_tambah.index'])}}">
                                        <i class="far fa{{set_dot(['jurnal_umum.index','jurnal_umum.show','jurnal_umum_tambah.index'])}}-circle nav-icon"></i>
                                        <p>Jurnal Umum</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{set_open(['laporan_penjualan.index','show_laporan_penjualan','laporan_pembelian.index','show_laporan_pembelian','stok_tersedia.index','jurnal.index','show_jurnal','buku_besar.index','show_buku_besar','neraca_saldo.index','show_neraca_saldo','laba_rugi.index','show_laba_rugi','neraca.index','show_neraca'])}}">
                            <a href="#" class="nav-link {{set_active(['laporan_penjualan.index','show_laporan_penjualan','laporan_pembelian.index','show_laporan_pembelian','stok_tersedia.index','jurnal.index','show_jurnal','buku_besar.index','show_buku_besar','neraca_saldo.index','show_neraca_saldo','laba_rugi.index','show_laba_rugi','neraca.index','show_neraca'])}}">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Laporan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Pembelian</small></li>
                                <li class="nav-item">
                                    <a href="{{url('laporan_pembelian')}}" class="nav-link {{set_active(['laporan_pembelian.index','show_laporan_pembelian'])}}">
                                        <i class="far fa{{set_dot(['laporan_pembelian.index','show_laporan_pembelian'])}}-circle nav-icon"></i>
                                        <p>Laporan Pembelian</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Penjualan</small></li>
                                <li class="nav-item">
                                    <a href="{{url('laporan_penjualan')}}" class="nav-link {{set_active(['laporan_penjualan.index','show_laporan_penjualan'])}}">
                                        <i class="far fa{{set_dot(['laporan_penjualan.index','show_laporan_penjualan'])}}-circle nav-icon"></i>
                                        <p>Laporan Penjualan</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Stok</small></li>
                                <li class="nav-item">
                                    <a href="{{url('stok_tersedia')}}" class="nav-link {{set_active(['stok_tersedia.index'])}}">
                                        <i class="far fa{{set_dot(['stok_tersedia.index'])}}-circle nav-icon"></i>
                                        <p>Stok Item Barang</p>
                                    </a>
                                </li>
                                <li class="nav-header ml-2 mt-0 mb-0 pt-0 pb-0"><small>Keuangan</small></li>
                                <li class="nav-item">
                                    <a href="{{url('jurnal')}}" class="nav-link {{set_active(['jurnal.index','show_jurnal'])}}">
                                        <i class="far fa{{set_dot(['jurnal.index','show_jurnal'])}}-circle nav-icon"></i>
                                        <p>Jurnal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('buku_besar')}}" class="nav-link {{set_active(['buku_besar.index','show_buku_besar'])}}">
                                        <i class="far fa{{set_dot(['buku_besar.index','show_buku_besar'])}}-circle nav-icon"></i>
                                        <p>Buku Besar (GL)</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('neraca_saldo')}}" class="nav-link {{set_active(['neraca_saldo.index','show_neraca_saldo'])}}">
                                        <i class="far fa{{set_dot(['neraca_saldo.index','show_neraca_saldo'])}}-circle nav-icon"></i>
                                        <p>Neraca Saldo (TB)</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('laba_rugi')}}" class="nav-link {{set_active(['laba_rugi.index','show_laba_rugi'])}}">
                                        <i class="far fa{{set_dot(['laba_rugi.index','show_laba_rugi'])}}-circle nav-icon"></i>
                                        <p>Laba Rugi (PL)</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('neraca')}}" class="nav-link {{set_active(['neraca.index','show_neraca'])}}">
                                        <i class="far fa{{set_dot(['neraca.index','show_neraca'])}}-circle nav-icon"></i>
                                        <p>Neraca (BS)</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
   
                        <li class="nav-item">
                            <a href="{{url('akun')}}" class="nav-link {{set_active(['akun.index'])}}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Akun
                                </p>
                            </a>
                        </li>
                        
                        @if($session_user->kelas_admin == "Super Admin")
                        <li class="nav-item">
                            <a href="{{url('manajemen_admin')}}" class="nav-link {{set_active(['manajemen_admin.index'])}}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Manajemen Admin
                                </p>
                            </a>
                        </li>
                        @endif

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        @yield('container')
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Muhammad Faris Ruswandi</strong>
            D1041171016
            <div class="float-right d-none d-sm-inline-block">
                Jurusan Informatika, Universitas Tanjungpura.
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('/template/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('/template/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/template/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{url('/template/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{url('/template/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{url('/template/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{url('/template/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('/template/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('/template/plugins/moment/moment.min.js')}}"></script></script>
    <script src="{{url('/template/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{url('/template/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{url('/template/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{url('/template/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{url('/template/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{url('/template/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{url('/template/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('/template/dist/js/demo.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('/template/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/template/dist/js/adminlte.min.js')}}"></script>

    <script src="{{url('/template/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    
    <!-- Select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    
</body>
@yield('script')

</html>
