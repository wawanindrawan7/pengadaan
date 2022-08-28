@extends('layouts.master')
@section('css')
    <style>
        th { font-size: 11px; }
        td { font-size: 11px; }
    </style>
@endsection
@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Perencana Pengadaan</div>
                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                            data-target="#create-modal">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Create
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Sumber Anggaran</th>
                                <th>Nilai Anggaran</th>
                                <th>Jenis</th>
                                <th>Volume</th>
                                <th>Metode Pengadaan</th>
                                {{-- <th>Nomor Nota Dinas</th>
                                <th>Tanggal Nota Dinas</th> --}}
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pengadaan as $u)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ url('pengadaan/detail?id=' . $u->id.'&tab=perencana') }}">{{ $u->nama }}</a></td>
                                    <td>{{ $u->lokasi }}</td>
                                    <td>{{ $u->sumber_anggaran }}</td>
                                    <td>{{ $u->nilai_anggaran }}</td>
                                    <td>{{ $u->jenis }}</td>
                                    <td>{{ $u->volume }}</td>
                                    <td>{{ $u->metode_pengadaan }}</td>
                                    {{-- <td>{{ $u->no_nota_dinas }}</td>
                                    <td>{{ $u->tgl_nota_dinas }}</td> --}}
                                    <td align="center">
                                        <a title="Update" href="#"
                                            class="btn btn-warning btn-round btn-xs mr-2 btn-update"
                                            data-id="{{ $u->id }}" data-nama="{{ $u->nama }}"
                                            data-lokasi="{{ $u->lokasi }}"
                                            data-sumber_anggaran="{{ $u->sumber_anggaran }}"
                                            data-nilai_anggaran="{{ $u->nilai_anggaran }}"
                                            data-jenis="{{ $u->jenis }}" data-volume="{{ $u->volume }}"
                                            data-metode_pengadaan="{{ $u->metode_pengadaan }}"
                                            data-no_nota_dinas="{{ $u->no_nota_dinas }}"
                                            data-tgl_nota_dinas="{{ $u->tgl_nota_dinas }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a title="Delete" href="#"
                                            class="btn btn-danger btn-round btn-xs mr-2 btn-delete"
                                            data-id="{{ $u->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
                pageLength:100
            });
        });

        $('#tgl_nota_dinas').datetimepicker({
            format: 'MM/DD/YYYY',
        });


        

        $(document).on('input','#nilai_anggaran', function(){
            var nilai_anggaran = $('#nilai_anggaran').val()
            $('.f_nilai_anggaran').text(nf.format(nilai_anggaran))
        })


        $('#form-create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pengadaan/create') !!}",
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
                            location.reload()
                        });
                    }
                }
            })
        });


        


    </script>
@endsection
