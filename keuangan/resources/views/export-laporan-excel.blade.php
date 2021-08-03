<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th colspan="6" rowspan="2" style="text-align: center;">Laporan Transaksi</th>
            </tr>
            <tr>
                <th>dari {{$from}} sampai dengan {{$to}}</th>
            </tr>
            <tr>
                <th rowspan="2">Tanggal</th>
                <th rowspan="2">Jenis</th>
                <th rowspan="2">Kategori</th>
                <th rowspan="2">Keterangan</th>
                <th colspan="2">Transaksi</th>
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
                <td colspan="4"><b>Subtotal</b></td>
                <td><b>{{"Rp ".number_format($totalpemasukan). ",-"}}</b></td>
                <td><b>{{"Rp ".number_format($totalpengeluaran). ",-"}}</b></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>