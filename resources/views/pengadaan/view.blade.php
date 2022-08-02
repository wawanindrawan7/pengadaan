@extends('layouts.master')
@section('css')
    <style>
        th { font-size: 11px; }
        td { font-size: 11px; }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-create" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Pengadaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Pengadaan</label>
                            <input type="text" class="form-control" name="nama" id="exampleFormControlInput1"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="exampleFormControlInput1"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Sumber Anggaran</label>
                            <select name="sumber_anggaran" class="form-control">
                                <option>Operasi</option>
                                <option>Investasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nilai Anggaran</label>
                            <input type="text" class="form-control" name="nilai_anggaran" id="exampleFormControlInput1"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jenis</label>
                            <select name="jenis" class="form-control">
                                <option>Barang</option>
                                <option>Jasa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Volume</label>
                            <input type="text" class="form-control" name="volume" id="exampleFormControlInput1"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Metode Pengadaan</label>
                            <select name="metode_pengadaan" class="form-control">
                                <option>Pengadaan Langsung</option>
                                <option>Penunjukan Langsung</option>
                                <option>Tender Terbatas</option>
                                <option>Tender Terbuka</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                            <input type="text" class="form-control" name="no_nota_dinas" id="exampleFormControlInput1"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Nota Dinas</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" name="tgl_nota_dinas">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-update" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Pengadaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <input type="hidden" name="id" id="e_id">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Pengadaan</label>
                            <input type="text" class="form-control" name="nama" id="e_nama" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Lokasi</label>
                            <input type="text" class="form-control" name="lokasi" id="e_lokasi" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Sumber Anggaran</label>
                            <select name="sumber_anggaran" class="form-control" id="e_sumber_anggaran">
                                <option>Operasi</option>
                                <option>Investasi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nilai Anggaran</label>
                            <input type="text" class="form-control" name="nilai_anggaran" id="e_nilai_anggaran"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jenis</label>
                            <select name="jenis" class="form-control" id="e_jenis">
                                <option>Barang</option>
                                <option>Jasa</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Volume</label>
                            <input type="text" class="form-control" name="volume" id="e_volume" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Metode Pengadaan</label>
                            <select name="metode_pengadaan" class="form-control" id="e_metode_pembayaran">
                                <option>Pengadaan Langsung</option>
                                <option>Penunjukan Langsung</option>
                                <option>Tender Terbatas</option>
                                <option>Tender Terbuka</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                            <input type="text" class="form-control" name="no_nota_dinas" id="e_no_nota_dinas"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Nota Dinas</label>
                            <div class="input-group">
                                <input type="text" class="form-control datepicker" id="e_datepicker"
                                    name="tgl_nota_dinas">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-check"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    {{-- <div class="card-title">Vendors List</div> --}}
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                            data-target="#create-modal">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Create
                        </a>
                    </div>
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
                                <th>Nomor Nota Dinas</th>
                                <th>Tanggal Nota Dinas</th>
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
                                    <td><a href="{{ url('pengadaan/detail?id=' . $u->id) }}">{{ $u->nama }}</a></td>
                                    <td>{{ $u->lokasi }}</td>
                                    <td>{{ $u->sumber_anggaran }}</td>
                                    <td>{{ $u->nilai_anggaran }}</td>
                                    <td>{{ $u->jenis }}</td>
                                    <td>{{ $u->volume }}</td>
                                    <td>{{ $u->metode_pengadaan }}</td>
                                    <td>{{ $u->no_nota_dinas }}</td>
                                    <td>{{ $u->tgl_nota_dinas }}</td>
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
            $('#basic-datatables').DataTable({});
        });

        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });


        $('#e_datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });


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


        $(document).on('click', '.btn-update', function(e) {
            $('#e_id').val($(this).data('id'))
            $('#e_nama').val($(this).data('nama'))
            $('#e_lokasi').val($(this).data('lokasi'))
            $('#e_sumber_anggaran').val($(this).data('sumber_anggaran'))
            $('#e_nilai_anggaran').val($(this).data('nilai_anggaran'))
            $('#e_jenis').val($(this).data('jenis'))
            $('#e_volume').val($(this).data('volume'))
            $('#e_metode_pengadaan').val($(this).data('metode_pengadaan'))
            $('#e_no_nota_dinas').val($(this).data('no_nota_dinas'))
            $('#e_datepicker').val($(this).data('tgl_usulan'))
            $('#update-modal').modal('show')
        })

        $('#form-update').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'post',
                url: "{!! url('pengadaan/update') !!}",
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

        $(document).on('click', '.btn-delete', function(e) {
            var id = $(this).data('id')
            e.preventDefault()
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, delete it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('pengadaan/delete?id=') }}" + id,
                        success: function(r) {
                            if (r == 'success') {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    type: 'success',
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    }
                                }).then(function() {
                                    location.reload()
                                });
                            }
                        }
                    })

                } else {
                    swal.close();
                }
            });
        })



    </script>
@endsection
