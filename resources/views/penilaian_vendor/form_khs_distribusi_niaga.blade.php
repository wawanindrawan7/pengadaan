@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Form KHS Distribusi Niaga</div>
                </div>
            </div>
            <div class="card-body">
                <form id="create">
                    @csrf
                    <input type="hidden" name="pelaksanaan_id" value="{{ $pengadaan->pelaksanaan->id }}">
                    <input type="hidden" name="form" value="KHS Distribusi & Niaga">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kriteria</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Bobot (%)</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Nilai</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Nilai X Bobot</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-group-default bg-info text-white mt-3">
                        <label for=""><b class="text-white">TENAGA KERJA</b></label>
                        <input type="hidden" name="tenaga_kerja" value="1. Tenaga Kerja">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Komunitas dan Responsif"
                                    name="tk_kriteria[]" id="k_kom_res">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="tk_bobot[]" id="b_kom_res"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="tk_nilai[]" id="n_kom_res">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="tk_nilai_bobot[]" readonly id="nb_kom_res">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Minimal 1 Tim Lengkap"
                                    name="tk_kriteria[]" id="k_min_1_tim">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="8" name="tk_bobot[]" id="b_min_1_tim"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="tk_nilai[]"
                                    id="n_min_1_tim">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="tk_nilai_bobot[]" readonly
                                    id="nb_min_1_tim">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="Pengawas K3 hadir saat pekerjaan dilaksanakan" name="tk_kriteria[]"
                                    id="k_pengawas_k3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="tk_bobot[]"
                                    id="b_pengawas_k3" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="tk_nilai[]"
                                    id="n_pengawas_k3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="tk_nilai_bobot[]" readonly
                                    id="nb_pengawas_k3">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default bg-info text-white mt-3">
                        <label for=""><b class="text-white">SOP/Instruksi Kerja</b></label>
                        <input type="hidden" name="sop" value="2. SOP/Instruksi Kerja">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kepatuhan Terhadap K2 dan K3"
                                    name="sop_kriteria[]" id="sop_kepatuhan_k2_k3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="20" name="sop_bobot[]"
                                    id="b_kepatuhan_k2_k3" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="sop_nilai[]"
                                    id="n_kepatuhan_k2_k3">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="sop_nilai_bobot[]" readonly
                                    id="nb_kepatuhan_k2_k3">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default bg-info text-white mt-3">
                        <label for=""><b class="text-white">Sistem Manajemen Kerja</b></label>
                        <input type="hidden" name="smk" value="3. Sistem Manajemen Kerja">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="Dilaksanakan safety briefing sebelum bekerja" name="smk_kriteria[]"
                                    id="smk_safety_briefing_sk">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="smk_bobot[]"
                                    id="b_safety_briefing_sk" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="smk_nilai[]"
                                    id="n_safety_briefing_sk">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="smk_nilai_bobot[]" readonly
                                    id="nb_safety_briefing_sk">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kualitas Pekerjaan"
                                    name="smk_kriteria[]" id="smk_kualitas_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="10" name="smk_bobot[]"
                                    id="b_kualitas_pekerjaan" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="smk_nilai[]"
                                    id="n_kualitas_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="smk_nilai_bobot[]" readonly
                                    id="nb_kualitas_pekerjaan">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kecepatan Penyelesaian Pekerjaan"
                                    name="smk_kriteria[]" id="smk_kecepatan_penyelesaian_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="smk_bobot[]"
                                    id="b_kecepatan_penyelesaian_pekerjaan" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="smk_nilai[]"
                                    id="n_kecepatan_penyelesaian_pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="smk_nilai_bobot[]" readonly
                                    id="nb_kecepatan_penyelesaian_pekerjaan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kesiapan administrasi penagihan"
                                    name="smk_kriteria[]" id="smk_kesiapan_adm_penagihan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="8" name="smk_bobot[]"
                                    id="b_kesiapan_adm_penagihan" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="smk_nilai[]"
                                    id="n_kesiapan_adm_penagihan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="smk_nilai_bobot[]" readonly
                                    id="nb_kesiapan_adm_penagihan">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default bg-info text-white mt-3">
                        <label for=""><b class="text-white">Penggunaan Alat Pelindung Diri (APD)</b></label>
                        <input type="hidden" name="papd" value="4. Penggunaan Alat Pelindung Diri (APD)">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Helm Safety" name="phpd_kriteria[]"
                                    id="phpd_helm_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="phpd_bobot[]"
                                    id="b_helm_safety" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_helm_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_helm_safety">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Sarung tangan kain"
                                    name="phpd_kriteria[]" id="phpd_sarung_tangan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="2" name="phpd_bobot[]"
                                    id="b_sarung_tangan" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_sarung_tangan">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_sarung_tangan">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kaca mata safety"
                                    name="phpd_kriteria[]" id="phpd_kaca_mata_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="2" name="phpd_bobot[]"
                                    id="b_kaca_mata_safety" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_kaca_mata_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_kaca_mata_safety">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="Pengaman panjat (Scafoulding, body harness)" name="phpd_kriteria[]"
                                    id="phpd_pengaman_penjat">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="2" name="phpd_bobot[]"
                                    id="b_pengaman_penjat" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_pengaman_penjat">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_pengaman_penjat">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Peralatan P3K" name="phpd_kriteria[]"
                                    id="phpd_p3k">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="phpd_bobot[]"
                                    id="b_p3k" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_p3k">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_p3k">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Baju Kerja/Rompi Schotlight"
                                    name="phpd_kriteria[]" id="phpd_baju_kerja">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="phpd_bobot[]"
                                    id="b_baju_kerja" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_baju_kerja">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_baju_kerja">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Sepatu safety" name="phpd_kriteria[]"
                                    id="phpd_sepatu_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="5" name="phpd_bobot[]"
                                    id="b_sepatu_safety" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="phpd_nilai[]"
                                    id="n_sepatu_safety">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="phpd_nilai_bobot[]" readonly
                                    id="nb_sepatu_safety">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default bg-info text-white mt-3">
                        <label for=""><b class="text-white">Peralatan Kerja</b></label>
                        <input type="hidden" name="pk" value="5. Peralatan Kerja">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    value="Kelengkapan Peralatan Kerja ( laik dan aman untuk digunakan)"
                                    name="pk_kriteria[]" id="pk_kelengkapan_per_kerja">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="8" name="pk_bobot[]"
                                    id="b_kelengkapan_per_kerja" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="" name="pk_nilai[]"
                                    id="n_kelengkapan_per_kerja">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="pk_nilai_bobot[]" readonly
                                    id="nb_kelengkapan_per_kerja">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Total Nilai Kinerja" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" name="total" id="total" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Kategori" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" class="form-control" name="kategori" id="kategori" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="button" id="btn-submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Keterangan</div>
                </div>
            </div>
            <div class="card-body">
                <p>Kategori Penilaian sebagai berikut : </p>
                <ul class="list-group list-group-bordered">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>BURUK</b>
                        <span class="badge badge-primary badge-pill">10 sampai dengan < 60</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>CUKUP</b>
                        <span class="badge badge-primary badge-pill">60 sampai dengan < 80</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <b>BAIK</b>
                        <span class="badge badge-primary badge-pill">80 sampai dengan 100</span>
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script>
        $(document).on('input', '#n_kom_res', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kom_res').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kom_res').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_min_1_tim', function() {
            var nilai = $(this).val();
            var bobot = $('#b_min_1_tim').val();
            var hasil = nilai * bobot / 10;
            $('#nb_min_1_tim').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_pengawas_k3', function() {
            var nilai = $(this).val();
            var bobot = $('#b_pengawas_k3').val();
            var hasil = nilai * bobot / 10;
            $('#nb_pengawas_k3').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_kepatuhan_k2_k3', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kepatuhan_k2_k3').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kepatuhan_k2_k3').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_safety_briefing_sk', function() {
            var nilai = $(this).val();
            var bobot = $('#b_safety_briefing_sk').val();
            var hasil = nilai * bobot / 10;
            $('#nb_safety_briefing_sk').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_kualitas_pekerjaan', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kualitas_pekerjaan').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kualitas_pekerjaan').val(hasil);
            recountTotal();
        });


        $(document).on('input', '#n_kecepatan_penyelesaian_pekerjaan', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kecepatan_penyelesaian_pekerjaan').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kecepatan_penyelesaian_pekerjaan').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_kesiapan_adm_penagihan', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kesiapan_adm_penagihan').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kesiapan_adm_penagihan').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_helm_safety', function() {
            var nilai = $(this).val();
            var bobot = $('#b_helm_safety').val();
            var hasil = nilai * bobot / 10;
            $('#nb_helm_safety').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_sarung_tangan', function() {
            var nilai = $(this).val();
            var bobot = $('#b_sarung_tangan').val();
            var hasil = nilai * bobot / 10;
            $('#nb_sarung_tangan').val(hasil);
            recountTotal();
        });


        $(document).on('input', '#n_kaca_mata_safety', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kaca_mata_safety').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kaca_mata_safety').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_pengaman_penjat', function() {
            var nilai = $(this).val();
            var bobot = $('#b_pengaman_penjat').val();
            var hasil = nilai * bobot / 10;
            $('#nb_pengaman_penjat').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_p3k', function() {
            var nilai = $(this).val();
            var bobot = $('#b_p3k').val();
            var hasil = nilai * bobot / 10;
            $('#nb_p3k').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_baju_kerja', function() {
            var nilai = $(this).val();
            var bobot = $('#b_baju_kerja').val();
            var hasil = nilai * bobot / 10;
            $('#nb_baju_kerja').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#n_sepatu_safety', function() {
            var nilai = $(this).val();
            var bobot = $('#b_sepatu_safety').val();
            var hasil = nilai * bobot / 10;
            $('#nb_sepatu_safety').val(hasil);
            recountTotal();
        });



        $(document).on('input', '#n_kelengkapan_per_kerja', function() {
            var nilai = $(this).val();
            var bobot = $('#b_kelengkapan_per_kerja').val();
            var hasil = nilai * bobot / 10;
            $('#nb_kelengkapan_per_kerja').val(hasil);
            recountTotal();
        });

        function recountTotal() {
            var komres = $('#nb_kom_res').val();
            var min_1_tim = $('#nb_min_1_tim').val();
            var pengawas_k3 = $('#nb_pengawas_k3').val();
            var kepatuhan_k2_k3 = $('#nb_kepatuhan_k2_k3').val();
            var safety_briefing = $('#nb_safety_briefing_sk').val();
            var kualitas_pekerjaan = $('#nb_kualitas_pekerjaan').val();
            var kecepatan_penyelesaian_pekerjaan = $('#nb_kecepatan_penyelesaian_pekerjaan').val();
            var kesiapan_adm_penagihan = $('#nb_kesiapan_adm_penagihan').val();
            var helm_safety = $('#nb_helm_safety').val();
            var sarung_tangan = $('#nb_sarung_tangan').val();
            var kaca_mata_safety = $('#nb_kaca_mata_safety').val();
            var pengaman_panjat = $('#nb_pengaman_penjat').val();
            var p3k = $('#nb_p3k').val();
            var baju_kerja = $('#nb_baju_kerja').val();
            var sepatu_safety = $('#nb_sepatu_safety').val();
            var kelengkapan_per_kerja = $('#nb_kelengkapan_per_kerja').val();
            var total = parseInt(komres) + parseInt(min_1_tim) + parseInt(pengawas_k3) + parseInt(kepatuhan_k2_k3) +
                parseInt(safety_briefing) + parseInt(kualitas_pekerjaan) + parseInt(kecepatan_penyelesaian_pekerjaan) +
                parseInt(kesiapan_adm_penagihan) + parseInt(helm_safety) + parseInt(sarung_tangan) + parseInt(
                    kaca_mata_safety) + parseInt(pengaman_panjat) + parseInt(p3k) + parseInt(baju_kerja) + parseInt(
                    sepatu_safety) + parseInt(kelengkapan_per_kerja);
            $('#total').val(total);

            var kategori;
            if (total >= 80) {
                kategori = 'Baik';
            } else if (total >= 60 && total < 80) {
                kategori = 'Cukup';
            } else {
                kategori = 'Buruk';
            }

            $('#kategori').val(kategori);
        }

        $(document).on('click','#btn-submit', function(e){
            console.log('click')
            $('#create').submit()
        })

        $('#create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('penilaian-form-khs/create') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    console.log(r)
                    if (r == 'success') {
                        swal("Good job!", "Simpan data berhasil !", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            window.location = "{{ url('pengadaan/detail?id=' . $pengadaan->id.'&tab=kontrak') }}";
                        });
                    }
                }
            })
        });
    </script>
@endsection
