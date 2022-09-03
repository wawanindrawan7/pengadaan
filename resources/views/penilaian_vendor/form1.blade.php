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
        <center>
            <h5>FORMULIR PENILAIAN KINERJA PENYEDIA JASA (PENILAIAN VENDOR) <br> DI LINGKUNGAN PT PLN (PERSERO)</h5>
        </center>
        <table id="basic-datatables" class="display table table-bordered table-hover mt-3">
            <tr>
                <th width="1%">a.</th>
                <th colspan="3">IDENTITAS PENYEDIA</th>
            </tr>
            <tr>
                <th width="1%">i</th>
                <th width="10%">NAMA PENYEDIA</th>
                <th width="1%">:</th>
                <th>{{ $pengadaan->pelaksanaan->mitra->nama }}</th>
            </tr>
            <tr>
                <th width="1%">ii</th>
                <th width="10%">ALAMAT PENYEDIA</th>
                <th>:</th>
                <th>{{ $pengadaan->pelaksanaan->mitra->alamat }}</th>
            </tr>
            <tr>
                <th width="1%">iii</th>
                <th width="10%">NPWP</th>
                <th>:</th>
                <th>{{ $pengadaan->pelaksanaan->mitra->npwp }}</th>
            </tr>

            <tr>
                <th width="1%">b.</th>
                <th colspan="3">DATA PENGADAAN</th>
            </tr>
            <tr>
                <th width="1%">i</th>
                <th width="10%">NAMA PEKERJAAN</th>
                <th>:</th>
                <th>{{ $pengadaan->nama }}</th>
            </tr>
            <tr>
                <th width="1%">ii</th>
                <th width="10%">NOMOR KONTRAK</th>
                <th>:</th>
                <th>{{ $pengadaan->pelaksanaan->nomor_kontrak }}</th>
            </tr>
            <tr>
                <th width="1%">iii</th>
                <th width="10%">NILAI KONTRAK</th>
                <th>:</th>
                <th>{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}</th>
            </tr>
            <tr>
                <th width="1%">iv</th>
                <th width="10%">TAHUN KONTRAK</th>
                <th>:</th>
                <th>{{ date('Y', strtotime($pengadaan->pelaksanaan->tgl_kontrak)) }}</th>
            </tr>
            <tr>
                <th width="1%">c.</th>
                <th colspan="3">INFORMASI KINERJA</th>
            </tr>

        </table>

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
                @foreach ($pengadaan->pelaksanaan->penilaianVendor->formPenilaian as $u)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $u->kriteria }}</td>
                        <td>{{ $u->bobot . '%' }} </td>
                        <td>{{ $u->nilai }}</td>
                        <td>{{ $u->nilai_bobot }}</td>
                    </tr>
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
