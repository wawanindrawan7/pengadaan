<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{!! $pengadaan->nama !!}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
            padding: 5px;
		}

        @page { margin-left: 0px; margin-right: 0px;margin-top: 24px; margin-bottom: 10px; }
        body { margin-left: 0px; margin-right: 0px;margin-top: 5px; margin-bottom: 10px;}

        * {
            font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif; 
        }

        .page_break { page-break-before: always; }
	</style>
</head>
<body style="margin: 0">
    <div class="container">
        <p style="text-align: center">
            <b style="font-size: 18sp">PT PLN (PERSERO) {{ $pengadaan->unit->nama }}</b>
            <br><br>
            <b style="font-size: 18sp">DOKUMEN RENCANA PENGADAAN</b>
            <br>
            Pekerjaan :
            <br>
            <b style="font-size: 14sp">{{ $pengadaan->nama }}</b>
            <br>
        </p>

        <p style="text-align: justify; font-size: 10pt;">
            Dokumen Rencana Pengadaan Pekerjaan: <b>{{ $pengadaan->nama }}</b> ini disusun berdasarkan analisis kebutuhan dengan sumber dari Anggaran {{ $pengadaan->sumber_anggaran }} 
            Fungsi Distribusi {{ ($pengadaan->pelaksanaan != null) ? $pengadaan->pelaksanaan->waktu_pelaksanaan : '-' }} dengan nomor PRK 2022.WNTB.9.007.
        </p>
        
        <b>1. Analisa Kebutuhan</b>
        <table border="1" style="width: 100%; font-size: 10pt;">
            <thead>
                <tr>
                    <th style="text-align: center">NO</th>
                    <th style="text-align: center">JENIS PEKERJAAN / MATERIAL</th>
                    <th style="text-align: center">VOLUME KEBUTUHAN</th>
                    <th style="text-align: center">KATEGORI KEBUTUHAN</th>
                    <th style="text-align: center">METODE PENGADAAN</th>
                    <th style="text-align: center">TANGGAL PENGGUNAAN</th>
                    <th style="text-align: center">WAKTU PELAKSANAAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $pengadaan->nama }}</td>
                    <td align="center">{{ $pengadaan->volume }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->kategori_kebutuhan }}</td>
                    <td align="center">{{ $pengadaan->metode_pengadaan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->tgl_penggunaan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->waktu_pelaksanaan }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <b>2. Pemilihan Strategi Pengadaan</b>
        <table border="1" style="width: 100%; font-size: 10pt;">
            <thead>
                <tr>
                    <th style="text-align: center">NO</th>
                    <th style="text-align: center" colspan="2">KARAKTERISTIK MATERIAL/JASA</th>
                    <th style="text-align: center">JUMLAH VENDOR</th>
                    <th style="text-align: center">METODE PENGADAAN</th>
                    <th style="text-align: center">STRATEGI PENGADAAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        Kebutuhan<br>
                        Volume<br>
                        Nilai Pengadaan<br>
                        Jumlah Pengguna<br>
                        Penyedia
                        
                    </td>
                    <td>
                        : {{ $pengadaan->perencanaan->kebutuhan }}<br>
                        : {{ $pengadaan->perencanaan->volume }}<br>
                        : {{ number_format($pengadaan->nilai_anggaran) }}<br>
                        : {{ $pengadaan->perencanaan->jumlah_pengguna }}<br>
                        : {{ $pengadaan->perencanaan->penyedia }}

                    </td>
                    <td align="center">{{ $pengadaan->perencanaan->jumlah_vendor }}</td>
                    <td align="center">{{ $pengadaan->metode_pengadaan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->strategi_pengadaan }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <b>3. Daftar dan Usulan Rencana Pengadaan</b>
        <table border="1" style="width: 100%; font-size: 10pt;">
            <thead>
                <tr>
                    <th style="text-align: center">NO</th>
                    <th style="text-align: center">JENIS PENGADAAN</th>
                    {{-- <th style="text-align: center">SPECTEK</th> --}}
                    <th style="text-align: center">VOL</th>
                    <th style="text-align: center">PEMAKAIAN</th>
                    <th style="text-align: center">KATEGORI</th>
                    <th style="text-align: center">JENIS KONTRAK</th>
                    <th style="text-align: center">WAKTU PELAKSANAAN</th>
                    <th style="text-align: center">STRATEGI PENGADAAN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $pengadaan->nama }}</td>
                    {{-- <td></td> --}}
                    <td align="center">{{ $pengadaan->volume }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->tgl_penggunaan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->kategori_kebutuhan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->jenis_kontrak }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->waktu_pelaksanaan }}</td>
                    <td align="center">{{ $pengadaan->perencanaan->strategi_pengadaan }}</td>
                </tr>
            </tbody>
        </table>

        <br>
        <p style="text-align: justify;font-size: 10pt;">Dokumen rencana pengadaan ini disusun dan diusulkan oleh Pejabat Perencana Pengadaan.</p>
        <br>
        <p style="text-align: center; margin-left: 400px;font-size: 10pt;">Mataram, {{ date('d F Y', strtotime($pengadaan->perencanaan->tgl_drp)) }}<br>Pejabat Perencana Pengadaan</p>
        <p style="text-align: center; margin-left: 400px;margin-top: 100px;font-size: 10pt;"><b>Doddy Hertanto</b></p>
        <br>
        {{-- <div class="page_break"></div> --}}
        <p style="font-size: 10pt;">Telah <i>Direview</i> Oleh;<br>Komite <i>Value For Money</i></p>
        <table style="width: 100%">
            @foreach ($pengadaan->usersReviewer as $item)
                <tr style="height: 300px;">
                    <th width="30%">{!! "\n".$item->users->name."\n\n" !!}</th>
                    <th width="15%"><br>.......................<br><br></th>
                </tr>
            @endforeach
        </table>
        
    </div>
</body>