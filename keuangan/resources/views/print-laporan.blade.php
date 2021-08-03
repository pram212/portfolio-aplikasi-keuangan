<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <title>Laporan Transaksi</title>
        <style>
        
            @media print{
                @page {size: portrait;}
            }
        </style>
</head>
<body>
    <center>
        <h2>Laporan Transaksi</h2>
        <p>{{date('d/m/Y', strtotime($from))}} s/d {{date('d/m/Y', strtotime($to))}}</p>
    </center>
    <table class="table table-sm table-bordered">
        <thead class="text-center">
            <tr>
                <th rowspan="2" class="align-middle">Tanggal</th>
                <th rowspan="2" class="align-middle">Jenis</th>
                <th rowspan="2" class="align-middle">Kategori</th>
                <th rowspan="2" class="align-middle">Keterangan</th>
                <th colspan="2" class="align-middle">Transaksi</th>
            </tr>
            <tr>
                <th>Pemasukan</th>
                <th>Pengeluaran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalpemasukan = 0;
                $totalpengeluaran = 0;
                @endphp
            @foreach ($laporan as $l)
            <tr>
                <td scope="row">{{date('d/m/y', strtotime($l->tanggal))}}</td>
                <td>{{ucwords($l->jenis)}}</td>
                <td>{{ucwords($l->kategori->kategori)}}</td>
                <td>{{ucwords($l->keterangan)}}</td>
                <td>
                    @if ($l->jenis == 'pemasukan')
                    {{"Rp ". number_format($l->nominal). ",-"}}
                    @elseif ($l->jenis =='pengeluaran')
                    Rp 0
                    @endif
                </td>
                <td>
                    @if ($l->jenis == 'pengeluaran')
                    {{"Rp ". number_format($l->nominal). ",-"}}
                    @elseif ($l->jenis == 'pemasukan')
                    Rp 0
                    @endif
                </td>
            </tr>
            @php
                if ($l->jenis == 'pemasukan') {
                    $totalpemasukan += $l->nominal;
                } else {
                    $totalpengeluaran += $l->nominal;
                }
                
                @endphp
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4" class="text-center"><b>Subtotal</b></td>
            <td><b>{{"Rp ".number_format($totalpemasukan). ",-"}}</b></td>
            <td><b>{{"Rp ".number_format($totalpengeluaran). ",-"}}</b></td>
        </tr>
    </tfoot>
</table>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        window.print()
    </script>
</body>
</html>