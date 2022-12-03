<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <style>
        .text {
            text-align: justify;
        }
    </style>

    <center>
        <h3><u>PAKTA INTEGRITAS</u></h3>
        <p><i>(LETTER OF UNDERTAKING)</i></p>
        <p>Nomor: <b>015.PI/PPRP.UIW.NTB/2020</b></p>
    </center>
    <p class="text">Kami yang menyatakan dan bertandatangan di bawah ini, Penguna Barang/Jasa, Direksi
        Pekerjaan, Pejabat Perencana
        Pengadaan Barang/Jasa, Pejabat Pelaksana Pengadaan Barang/Jasa Serta Komite <i>Value For Money</i> PT PLN (Persero)
       {{ $pengadaan->unit->nama }} dengan ini menyatakan dengan sebenarnya, bahwa sehubungan dengan proses
        pengadaan <b>Pekerjaan: {{ $pengadaan->nama }}</b> menyatakan:
    </p>

    <p class="text">1. Kami akan melaksanakan dan memeriksa bahwa proses Pengadaan tersebut dilaksanakan sesuai dengan
        kewenangan
        yang diberikan berdasarkan Peraturan Direksi No 0022.P/DIR/2020 tanggal 02 Maret 2020 tentang Pedoman Pengadaan
        Barang/Jasa PT PLN (Persero) dan perubahannya serta memperhatikan ketentuan yang berlaku, berdasarkan
        prinsip-prinsip itikad baik, dengan kecermatan yang tinggi, dan dalam keadaan bebas, mandiri atau tidak dibawah
        tekanan, maupun pengaruh dari pihak lain (<i>independency</i>).</p>
    <p class="text">2. Kami akan melaksanakan proses Pengadaan sebagaimana tersebut di atas dengan penuh kehati-hatian
        (<i>duty of care
        and of loyality</i>) demi untuk kepentingan yang terbaik bagi perusahaan, dengan mengindahkan berbagai sumber
        informasi, keterangan dan telah melakukan perbandingan yang cukup, sebagaimana layaknya seorang professional
        dalam posisi yang sama melakukan hal serupa, atau sebagaimana kami mempertimbangkan keputusan bagi kepentingan
        diri kami sendiri (<i>prudent person role</i>).</p>
    <p class="text">3. Dalam melaksanakan proses Pengadaan sebagaimana tersebut di atas kami tidak memiliki kepentingan
        pribadi atau
        tujuan untuk melakukan sesuatu untuk manfaat diri sendiri, maupun menguntungkan pihak-pihak yang terkait dengan
        diri kami, atau pihak yang terafiliasi dengan kami, dan dengan demikian tidak memiliki posisi yang mengandung
        potensi benturan kepentingan (<i>conflict of interest</i>), termasuk dengan seluruh pihak yang terlibat dengan tindakan
        di atas.</p>
    <p class="text">4. Kami akan melaksanakan proses Pengadaan tersebut dengan pemahaman yang cukup tentang berbagai
        peraturan dan
        kewajiban normative lainnya yang terkait, dan mematuhi seluruh kertentuan dan peraturan perundang-undangan yang
        berlaku, termasuk mempertimbangkan <i>best practice</i>, yang dipandang perlu, penting dan kritikal dalam proses
        tersebut (<i>duty abiding the laws</i>).</p>
    <p class="text">Pernyataan ini kami sampaikan dengan sebenar-benarnya, tanpa menyembunyikan fakta dan hal material
        apapun, dan
        dengan demikian kami bertanggung jawab sepenuhnya atas kebenaran dari hal-hal yang kami nyatakan di sini,
        demikian pula akan bersedia bertanggung jawab baik secara perdata maupun pidana, apabila laporan dan pernyataan
        ini tidak sesuai dengan kenyataan sebenarnya.</p>
    <p>Demikian pernyataan ini kami buat untuk dapat digunakan sebagaimana mestinya.</p>
    <center>
        <p>Mataram, {!! date('d F Y', strtotime($pengadaan->perencanaan->tgl_pakta_integritas)) !!}</p>
    </center>
<br>
<br>
    <table width="100%">
        <tr>
            <td width="60%"><br>Pengguna Barang / Jasa : Sudjarwo (General Manager)<br></td>
            <td width="40%"><br>......................................<br></td>
        </tr>
    </table>

    <p><u>Komite <i>Value For Money</i> : </u></p>

    <table width="100%">
        @foreach ($pengadaan->usersReviewer as $item)
            <tr>
                <td width="60%"><br>{!! "\n".Str::ucfirst(trans($item->users->name))."\n\n"  !!}<br></td>
                <td width="40%"><br>......................................<br><br></td>
            </tr>
        @endforeach
    </table>
    <br>
    <br>
    <table width="100%">
        <tr>
            <td width="40%"><br>Pejabat Perencana Pengadaan<br><br></td>
            <td width="2%"><br>:<br><br></td>
            <td width="18%"><br>Doddy Hertanto<br><br></td>
            <td width="40%"><br>......................................<br><br></td>
        </tr>
        <tr>
            <td width="40%"><br>Pejabat Pelaksana Pengadaan<br><br></td>
            <td width="2%"><br>:<br><br></td>
            <td width="18%"><br>I Made Santiadhi<br><br></td>
            <td width="40%"><br>......................................<br><br></td>
        </tr>
    </table>

</body>

</html>
