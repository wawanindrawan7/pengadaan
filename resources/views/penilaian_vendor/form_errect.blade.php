@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Form Errect</div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Kriteria</label>
                            <input type="text" class="form-control" value="Kualitas" name="kriteria[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Bobot (%)</label>
                            <input type="number" class="form-control" value="30" name="bobot[]" id="bobot_kualitas"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Nilai</label>
                            <input type="number" class="form-control" value="nilai" name="nilai[]" id="nilai_kualitas">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="">Nilai X Bobot</label>
                            <input type="number" class="form-control" name="nilai_bobot[]" id="nilai_bobot_kualitas"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="Delivery (Waktu Penyelesaian Pekerjaan)"
                                name="kriteria[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" value="30" name="bobot[]" id="bobot_delivery"
                                readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" value="nilai" name="nilai[]" id="nilai_delivery">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" name="nilai_bobot[]" readonly
                                id="nilai_bobot_delivery">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" value="Responsiveness" name="kriteria[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" value="10" name="bobot[]"
                                id="bobot_responsiveness" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" value="nilai" id="nilai_responsiveness"
                                name="nilai[]">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number" class="form-control" name="nilai_bobot[]" id="nilai_bobot_responsiveness"
                                readonly>
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
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).on('input', '#nilai_kualitas', function() {
            var nilai = $(this).val();
            var bobot = $('#bobot_kualitas').val();
            var hasil = nilai * bobot / 100;
            $('#nilai_bobot_kualitas').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#nilai_delivery', function() {
            var nilai = $(this).val();
            var bobot = $('#bobot_delivery').val();
            var hasil = nilai * bobot / 100;
            $('#nilai_bobot_delivery').val(hasil);
            recountTotal();
        });

        $(document).on('input', '#nilai_responsiveness', function() {
            var nilai = $(this).val();
            var bobot = $('#bobot_responsiveness').val();
            var hasil = nilai * bobot / 100;
            $('#nilai_bobot_responsiveness').val(hasil);
            recountTotal();
        });

        function recountTotal() {
            var kualitas = $('#nilai_bobot_kualitas').val();
            var delivery = $('#nilai_bobot_delivery').val();
            var responsiveness = $('#nilai_bobot_responsiveness').val();
            var total = parseInt(kualitas) + parseInt(delivery) + parseInt(responsiveness);
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
    </script>
@endsection
