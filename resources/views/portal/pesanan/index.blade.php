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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Pesanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($items as $item)
                                <div class="form-group mt-2">
                                    <label for="kode_item">{{$item->nama_menu}}</label><br>
                                    <select id="change_data_tambah" name="kode_item" class="form-control mt-0"
                                        required>
                                        <option disabled selected value="">Pilih Kode Item</option>
                                        <option value="OPTION 1">{{$item->min_order}}</option>
                                        <option value="OPTION 1">{{$item->max_order}}</option>
                                    </select>
                                </div>

                                @endforeach
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        sdasdasdasd
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        var $formAdd = $("#formAdd");
        $formAdd.submit(function(){
            $formAdd.submit(function(){
                return false;
            });
        });
    </script>

    <script type="text/javascript">
        var $formEdit = $("#formEdit");
        $formEdit.submit(function(){
            $formEdit.submit(function(){
                return false;
            });
        });
    </script>

    <!--Data Table -->
    <script>
        $(function() {
            $("#tabel_quote").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tabel_quote_wrapper .col-md-6:eq(0)');
        });

        $(document).on("click", ".open-formModalEdit", function() {
            var id = $(this).data('id');
            var teks = $(this).data('teks');
            var sumber = $(this).data('sumber');
            var nama_foto = $(this).data('nama_foto');
            var release_date = $(this).data('release_date');

            $(".modal-body #id").val(id);
            $(".modal-body #teks").val(teks);
            $(".modal-body #sumber").val(sumber);
            $(".modal-body #release_date").val(release_date);
            $(".modal-body #old_nama_foto").attr('src', nama_foto);
        });
        
        var uploadField = document.getElementById("input_foto_add");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) {
                alert("Batas maksimum 2MB!");
                this.value = "";
            } else {
                //Ubah Img Preview
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('img_preview_add');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            };
        };
        //Form edit image validation
        var uploadField = document.getElementById("input_foto_edit");
        uploadField.onchange = function() {
            if (this.files[0].size > 2000000) {
                alert("Batas maksimum 2MB!");
                this.value = "";
            } else {
                //Ubah Img Preview
                var reader = new FileReader();
                reader.onload = function() {
                    var output = document.getElementById('old_nama_foto');
                    output.src = reader.result;
                }
                reader.readAsDataURL(event.target.files[0]);
            };
        };
    </script>

    <script type="text/javascript">
        (function(){
            $('.from-prevent-multiple-submits').on('submit', function(){
                $('.from-prevent-multiple-submits').attr('disabled','true');
            })
        })();
    </script>
@endsection
