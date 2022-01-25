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
    <h1 class="h3 mb-2 text-gray-800">User</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable-user" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Tanggal dibuat</th>
                            <th width="16%">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Tanggal dibuat</th>
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
@endsection


<!-- include form.blade.php -->
@include('user.form')


@section('script')

<script>
    var tableUser = $('#dataTable-user').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('api.user') }}",
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
            }, {
                data: 'name',
                name: 'name',
            },
            {
                data: 'email',
                name: 'email',
            },
            {
                data: 'active',
                name: 'active',
            },
            {
                data: 'created_at',
                name: 'created_at',
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            },
        ]
    })

    function editForm(id) {
        if (id == 1) {
            swal('Tidak bisa mengedit data akun ini!');
            return;
        }

        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modalUser form')[0].reset();

        $.ajax({
            url: "{{ url('user') }}" + "/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                $('#modalUser').modal('show');
                $('.modal-title').text('Edit User');

                $('#id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#active').val(data.active);

            },
            error: function() {
                alert("No Data");
            }
        })
    }


    function deleteData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        if (id == 1) {
            swal('Tidak bisa menghapus data akun ini!');
            return;
        }

        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            cancelButtonColor: '#d33',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then(function() {
            $.ajax({
                url: "{{ url('user') }}" + "/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function(data) {
                    tableUser.ajax.reload();
                    swal({
                        title: 'Success!',
                        text: 'Data has been deleted!',
                        type: 'success',
                    })
                },
                error: function() {
                    swal({
                        title: 'Oops !',
                        text: 'Something went wrong!',
                        type: 'error',
                    })
                }
            })
        })
    }

    $(function() {
        $('#save-user').on('click', function(e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id').val();
                // edit
                if (save_method == 'edit') {
                    function sweetalert() {
                        return swal({
                            title: "Success!",
                            text: "Data has been edited!",
                            type: "success"
                        });
                    }
                    url = "{{ url('user') . '/' }}" + id;
                }
            }

            $.ajax({
                url: url,
                type: "POST",
                data: $('#modalUser form').serialize(),
                success: function($data) {
                    $('#modalUser').modal('hide');
                    tableUser.ajax.reload();
                    sweetalert();
                },
                error: function() {
                    swal({
                        title: 'Oops!',
                        text: 'Something went wrong!',
                        type: 'error',
                    })
                }
            })

            return false;
        })
    })
</script>
@endsection