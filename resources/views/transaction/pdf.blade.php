<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>PDF</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h5>Laporan Uang Kas Kematian</h5>
                <h6>Kampung Cireungit RT.05 RW.01</h6>
                <p class="small">Dari {{ date('d F Y', strtotime($dariTanggal)) }} sampai {{ date('d F Y', strtotime($sampaiTanggal)) }}</p>
                <hr>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-12">
                <table class="table table-bordered small">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Penerimaan</th>
                            <th scope="col">Pengeluaran</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $index => $transaction)
                        <tr>
                            <td scope="row">{{ $index + 1 }}</td>
                            <td>{{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                            <td>{{ $transaction->penerimaan }}</td>
                            <td>{{ $transaction->pengeluaran }}</td>
                            <td>{{ $transaction->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>