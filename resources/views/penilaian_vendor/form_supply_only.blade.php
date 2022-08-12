@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Form Supply Only</div>
                </div>
            </div>
            <div class="card-body">
                <form id="create">
                    @csrf
                    <input type="hidden" name="pelaksanaan_id" value="{{ $pengadaan->pelaksanaan->id }}">
                    <input type="hidden" name="form" value="Supply Only">
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
                                <input type="number" class="form-control" value="40" name="bobot[]" id="bobot_kualitas"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <input type="number" class="form-control" value="nilai" name="nilai[]"
                                    id="nilai_kualitas">
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
                                <input type="number" class="form-control" value="40" name="bobot[]" id="bobot_delivery"
                                    readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="number" class="form-control" value="nilai" name="nilai[]"
                                    id="nilai_delivery">
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
                                <input type="number" class="form-control" value="20" name="bobot[]"
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
                                <input type="number" class="form-control" name="nilai_bobot[]"
                                    id="nilai_bobot_responsiveness" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <input type="text" class="form-control" value="Total Nilai Kenerja" readonly>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
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

        $('#create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('penilaian-form-errect/create') !!}",
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
                            window.location =
                                "{{ url('pengadaan/detail?id=' . $pengadaan->id) }}";
                        });
                    }
                }
            })
        });
    </script>
@endsection
