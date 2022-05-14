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

    <style>
        input.invalid {
            background-color: #ffdddd;
        }

        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #5e5e5e;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #fac400;
        }

        .tab {
            display: none;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light"
        style="width:100%;padding-left:0;margin-left:0">
        <!-- Left navbar links -->

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <!-- Notifications Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" onclick=logOut()>
                    <i class="fas fa-sign-out-alt text-danger mr-2"></i> Logout
                </a>
            </li>

        </ul>
    </nav>
    <div class="wrapper">

        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        @yield('container')
        <!-- /.content-wrapper -->

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
    <script src="{{url('/template/plugins/moment/moment.min.js')}}"></script>
    </script>
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
