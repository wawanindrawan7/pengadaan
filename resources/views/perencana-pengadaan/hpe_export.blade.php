<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $pengadaan->nama !!}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <style type="text/css">
        table tr td,
        table tr th {
            font-size: 10pt;
            padding: 5px;
        }

        @page {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 24px;
            margin-bottom: 10px;
        }

        body {
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 5px;
            margin-bottom: 10px;
        }

        * {
            font-family: Calibri, Candara, Segoe, Segoe UI, Optima, Arial, sans-serif;
        }
    </style> --}}
</head>

<body style="margin: 0">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="text-align: center;" rowspan="2">No.</th>
                <th style="text-align: center;" rowspan="2">Nama Item</th>
                <th style="text-align: center;" rowspan="2" colspan="2">Vol</th>
                <th style="text-align: center;" rowspan="2">Satuan</th>
                <th style="text-align: center;" colspan="2">Nilai Pekerjaan</th>
                {{-- <th style="text-align: center;"  rowspan="2">Option</th> --}}

            </tr>
            <tr>
                <th style="text-align: center;">Harga Satuan</th>
                <th style="text-align: center;">Jumlah</th>
            </tr>
        </thead>
        <tbody id="tbody">
            @php
                $no = 1;
            @endphp
            @foreach ($pengadaan->perencanaan->hpeItem as $item)
                <tr>
                    <td align="center">{{ $no++ }}</td>
                    <td>{{ $item->item }}</td>
                    <td align="center" width="5%" align="center">{{ $item->vol_1 }}</td>
                    <td align="center" width="5%" align="center">{{ $item->vol_2 }}</td>
                    <td align="center">{{ $item->satuan }}</td>
                    <td align="right">{{ number_format($item->harga_satuan) }}</td>
                    <td align="right">{{ number_format($item->jumlah) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th colspan="6">TOTAL</th>
                <th id="total_hpe" style="text-align: right">
                    {{ number_format($pengadaan->perencanaan->hpeItem->sum('jumlah')) }}
                </th>
            </tr>
        </tfoot>
    </table>
</body>
