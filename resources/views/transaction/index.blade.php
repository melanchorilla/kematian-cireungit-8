@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
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
    <h1 class="h3 mb-2 text-gray-800">Transaksi</h1>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables</h6> -->
            <button onclick="addForm()" class="m-0 font-weight-bold btn btn-primary" data-toggle="modal" data-target="#modalTransaction">Tambah Transaksi</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-transaction" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Penerimaan</th>
                            <th>Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>Penerima</th>
                            <th width="16%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Penerimaan</th>
                            <th>Pengeluaran</th>
                            <th>Keterangan</th>
                            <th>Penerima</th>
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
<!-- /.container-fluid -->


<!-- include form.blade.php -->
@include('transaction.form')

@endsection

<!-- DataTable Script -->
@section('script')
<script>
    var tableTransaction = $('#dataTable-transaction').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.transaction') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            }, {
                data: 'created_at',
                name: 'created_at',
            }, {
                data: 'penerimaan',
                name: 'penerimaan',
            }, {
                data: 'pengeluaran',
                name: 'pengeluaran',
            },
            {
                data: 'keterangan',
                name: 'keterangan',
            }, {
                data: 'name',
                name: 'name',
            }, {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ],
        dom: 'lBfrtip',
        aLengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
        buttons: [
            {
                extend: 'excel',
                text: 'Excel',
                className: 'btn btn-success',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                className: 'btn btn-danger',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-default',
                exportOptions: {
                    columns: 'th:not(:last-child)'
                }
            }
        ]
    })


    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modalTransaction').modal('show');
        $('#modalTransaction form')[0].reset();
        $('.modal-title').text('Tambah Transaksi');
    }


    function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modalTransaction form')[0].reset();

        $.ajax({
            url: "{{ url('transaction') }}" + "/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modalTransaction').modal('show');
                $('.modal-title').text('Edit Transaksi');

                $('#id').val(data.id);
                $('#penerimaan').val(data.penerimaan);
                $('#pengeluaran').val(data.pengeluaran);
                $('#keterangan').val(data.keterangan);

            },
            error: function() {
                alert("No Data");
            }
        })
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
                url: "{{ url('transaction') }}" + "/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function(data) {
                    tableTransaction.ajax.reload();
                    swal({
                        title: 'Sukses!',
                        text: 'Data berhasil dihapus!',
                        type: 'success',
                    })
                },
                error: function() {
                    swal({
                        title: 'Ups !',
                        text: 'Error!',
                        type: 'error',
                    })
                }
            })
        })
    }

    $(function() {
        $('#save-transaction').on('click', function(e) {
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
                    url = "{{ url('transaction') }}";
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
                    url = "{{ url('transaction'). '/' }}" + id;
                }

            }
            // dikosongin dulu, ntar isi diatas ini
            $.ajax({
                url: url,
                type: "POST",
                data: $('#modalTransaction form').serialize(),
                success: function($data) {
                    $('#modalTransaction').modal('hide');
                    tableTransaction.ajax.reload();
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