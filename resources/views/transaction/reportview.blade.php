@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Cetak Laporan</h1>
    <div class="row mt-4">
        <div class="col-md-12">
            <form method="post" action="/transactionreportpdf" id="formLaporan">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dariTanggal">Dari</label>
                        <input type="text" class="form-control" name="dariTanggal" id="dariTanggal" required autocomplete="off">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="sampaiTanggal">Sampai</label>
                        <input type="text" class="form-control" name="sampaiTanggal" id="sampaiTanggal" required autocomplete="off">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="cetakBtn">Cetak</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(function() {
        $('#dariTanggal').datepicker({
            dateFormat: "yy-mm-dd"
        });
        $('#sampaiTanggal').datepicker({
            dateFormat: "yy-mm-dd"
        });
    })


    jQuery.validator.addMethod("greaterThan",
        function(value, element, params) {

            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date($(params).val());
            }

            return isNaN(value) && isNaN($(params).val()) ||
                (Number(value) > Number($(params).val()));
        }, 'Must be greater than {0}.');

    $("#formLaporan").validate({
        rules: {
            sampaiTanggal: {
                greaterThan: "#dariTanggal"
            }
        }
    });
</script>
@endsection