<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $pengadaan->nama !!}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
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
    </style>
</head>

<body style="margin: 0">
    <div class="container">
        <table id="basic-datatables" class="display table table-bordered table-hover">
            <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th width="60%">Kriteria Penilaian</th>
                    <th width="10%">Bobot</th>
                    <th width="10%">Nilai</th>
                    <th width="9%">Nilai X Bobot</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengadaan->pelaksanaan->penilaianVendor->formKhs as $khs)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td colspan="4"><b>{{ $khs->nama }}</b></td>
                    </tr>
                    @foreach ($khs->formKhsDetail as $khsDetail)
                        <tr>
                            <td></td>
                            <td><i>{{ $khsDetail->kriteria }}</i></td>
                            <td>{{ $khsDetail->bobot }} </td>
                            <td>{{ $khsDetail->nilai }}</td>
                            <td>{{ $khsDetail->nilai_bobot }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total</th>
                    <td>{{ $pengadaan->pelaksanaan->penilaianVendor->total }}</td>
                </tr>
                <tr>
                    <th colspan="4">Kategori</th>
                    <td>{{ $pengadaan->pelaksanaan->penilaianVendor->kategori }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
