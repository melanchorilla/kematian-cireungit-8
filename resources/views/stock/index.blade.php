@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Stok</h1>

    <!-- DataTables -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button onclick="addForm()" class="m-0 font-weight-bold btn btn-primary" data-toggle="modal" data-target="#modalStock">Tambah Data Stock</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-stock" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Keterangan</th>
                            <th>Dikelola Oleh</th>
                            <th width="16%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Keterangan</th>
                            <th>Dikelola Oleh</th>
                            <th width="16%">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- / .container-fluid -->

<!-- include form.blade.php -->
@include('stock.form')

@endsection

<!-- DataTable script -->
@section('script')
<script>
    var tableStock = $('#dataTable-stock').DataTable({
        processing: true,
        server: true,
        ajax: "{{ route('api.stock') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            },
            {
                data: 'nama_barang',
                name: 'nama_barang',
            },
            {
                data: 'jumlah_barang',
                name: 'jumlah_barang',
            },
            {
                data: 'keterangan',
                name: 'keterangan',
            },
            {
                data: 'name',
                name: 'name',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
            },
        ]
    });


    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modalStock').modal('show');
        $('#modalStock form')[0].reset();
        $('.modal-title').text('Tambah Data Stok');
    }

    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modalStock form')[0].reset();

        $.ajax({
            url: "{{ url('stock') }}" + "/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modalStock').modal('show');
                $('.modal-title').text('Edit Stok');

                $('#id').val(data.id);
                $('#nama_barang').val(data.nama_barang);
                $('#jumlah_barang').val(data.jumlah_barang);
                $('#keterangan').val(data.keterangan);
            },
            error: function() {
                alert("No Data");
            }
        });
    }

    function deleteData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        swal({
            title: 'Yakin?',
            text: "Apakah anda ingin menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!'
        }).then(function() {
            $.ajax({
                url: "{{ url('stock') }}" + "/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function(data) {
                    tableStock.ajax.reload();
                    swal({
                        title: 'Sukses!',
                        text: 'Data berhasil dihapus!',
                        type: 'success',
                    })
                },
                error: function() {
                    swal({
                        title: 'Ups !',
                        text: 'Ada yang error!',
                        type: 'error',
                    })
                }
            })
        })
    }

    $(function() {
        $('#save-stock').on('click', function(e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                // add
                if (save_method == 'add') {
                    function sweetalert() {
                        return swal({
                            title: "Sukses!",
                            text: "Data berhasil dibuat!",
                            type: "success"
                        });
                    }
                    url = "{{ url('stock') }}";
                }
                // edit
                else {
                    function sweetalert() {
                        return swal({
                            title: "Sukses!",
                            text: "Data berhasil diubah!",
                            type: "success"
                        });
                    }
                    url = "{{ url('stock'). '/' }}" + id;
                }

            }
            // dikosongin dulu, ntar isi diatas ini
            $.ajax({
                url: url,
                type: "POST",
                data: $('#modalStock form').serialize(),
                success: function($data) {
                    $('#modalStock').modal('hide');
                    tableStock.ajax.reload();
                    sweetalert();
                },
                error: function() {
                    swal({
                        title: 'Ups!',
                        text: 'Error!',
                        type: 'error'
                    })
                }
            })

            return false;

        })
    })
</script>
@endsection