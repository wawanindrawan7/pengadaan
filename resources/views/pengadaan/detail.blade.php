@extends('layouts.master')
@section('css')
    <style>
        
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-with-nav">
                <div class="card-header">
                    <div class="row row-nav-line">
                        <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">

                            <li class="nav-item submenu"> <a class="nav-link active show" data-toggle="tab" href="#profile"
                                    role="tab" aria-selected="false">Pengadaan</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#settings"
                                    role="tab" aria-selected="false">Perencana Pengadaan</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#pelaksanaan"
                                    role="tab" aria-selected="false">Pelaksana Pengadaan</a> </li>
                            <li class="nav-item submenu"> <a class="nav-link" data-toggle="tab" href="#amandemen"
                                    role="tab" aria-selected="false">Manajemen Kontrak</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3">
                        <div class="tab-pane fade active show" id="profile" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="modal fade" id="create-pengadaan-file-modal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <form id="pengadaan_file" enctype="multipart/form-data">
                                            @csrf

                                            <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Upload File Pengadaan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kategori</label>
                                                    <select class="form-control" name="kategori" required>
                                                        <option value=""></option>
                                                        <option>KKP</option>
                                                        <option>TOR/KAK</option>
                                                        <option>Referensi</option>
                                                        <option>RAB/PA</option>
                                                        <option>Nota Dinas GM ke Rendan</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">File</label>
                                                    <input type="file" class="form-control" name="file[]"
                                                        multiple="multiple" required>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nama</label>
                                        <input disabled type="text" class="form-control" value="{{ $pengadaan->nama }}"
                                             />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Lokasi</label>
                                        <input type="text" class="form-control" value="{{ $pengadaan->unit->nama }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Sumber Anggaran</label>
                                        <input type="text" class="form-control" value="{{ $pengadaan->sumber_anggaran }}"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nilai Anggaran (RAB)</label>
                                        <input type="text" class="form-control" value="{{ number_format($pengadaan->nilai_anggaran) }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Jenis</label>
                                        <input type="text" class="form-control" value="{{ $pengadaan->jenis }}"
                                            disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Volume</label>
                                        <input type="text" class="form-control" value="{{ $pengadaan->volume }}"
                                            disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Metode Pengadaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengadaan->metode_pengadaan }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Nomor Nota Dinas</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengadaan->no_nota_dinas }}" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label>Tanggal Nota Dinas</label>
                                <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($pengadaan->tgl_nota_dinas)) }}"  disabled/>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Direksi Pekerjaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengadaan->direksiPk->users->name }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Pengawas Pekerjaan</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengadaan->pengawasPk->users->name }}" disabled />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Pengawas K3</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengadaan->pengawasK3->users->name }}" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2"
                                    data-toggle="modal" data-target="#create-pengadaan-file-modal">
                                    <span class="btn-label">
                                        <i class="fa fa-upload"></i>
                                    </span>
                                    Upload File
                                </a>
                            </div>

                            @if ($pengadaan != null && $pengadaan->pengadaanFile != null)
                            <div class="table-responsive mt-2">
                                <table class="table table-bordered table-bordered-bd-info">
                                    <tbody>
                                        @php
                                        $no = 1;
                                        @endphp
                                        @foreach ($pengadaan->pengadaanFile as $u)
                                        <tr>
                                            <td width="1%">{{ $no ++ }}</td>
                                            <td width="30%">
                                                <a href="{{ url($u->file) }}">{{ $u->kategori }}</a>
                                            </td>
                                            <td align="center" width="1%">

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
                            @endif

                        </div>
                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('pengadaan.perencanaan')
                        </div>
                        <div class="tab-pane fade" id="pelaksanaan" role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('pengadaan.pelaksanaan')
                        </div>
                        <div class="tab-pane fade" id="amandemen" role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('pengadaan.amandemen')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        

        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });

        loadMitra()

        function loadMitra(){
            $.ajax({
                type : 'GET',
                url : "{{ url('mitra/get-data') }}",
                success : function(r){
                    $('#mitra_id').empty()
                    $('#mitra_id').append('<option value=""></option>')
                    $.each(r.mitra, function(i, d){
                        $('#mitra_id').append('<option value="'+d.id+'">'+d.nama+'</option>')
                    })
                }
            })
        }

        $(document).on('input','#nilai_kontrak', function(){
            var nilai_kontrak = $('#nilai_kontrak').val()
            $('.f_nilai_kontrak').text(nf.format(nilai_kontrak))
        })

        $('#pengadaan_file').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pengadaan/detail/create') !!}",
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
                        url: "{{ url('pengadaan-file/delete?id=') }}" + id,
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

        $('#form_perencanaan').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('perencanaan/create') !!}",
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

        $('#perencanaan_file').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('perencanaan/file') !!}",
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

        $(document).on('click', '.btn-delete-perencanaan', function(e) {
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
                        url: "{{ url('perencanaan-file/delete?id=') }}" + id,
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

        $('#form_pelaksanaan').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pelaksanaan/create') !!}",
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
            $('#e_no_nota_dinas').val($(this).data('no_nota_dinas'))
            $('#e_tgl_nota_dinas').val($(this).data('tgl_nota_dinas'))
            $('#e_nomor_kontrak').val($(this).data('nomor_kontrak'))
            $('#e_tgl_kontrak').val($(this).data('tgl_kontrak'))
            $('#e_penyedia_barang_jasa').val($(this).data('penyedia_barang_jasa'))
            $('#e_tgl_efektif').val($(this).data('tgl_efektif'))
            $('#e_tgl_akhir').val($(this).data('tgl_akhir'))
            $('#e_nilai_kontrak').val($(this).data('nilai_kontrak'))
            $('#update-pelaksanaan').modal('show')
        })

        $('#pelaksanaan_file').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pelaksanaan/file') !!}",
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

        $(document).on('click', '.btn-delete-pelaksanaan', function(e) {
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
                        url: "{{ url('pelaksanaan-file/delete?id=') }}" + id,
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

        $('#form_amandemen').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('amandemen/create') !!}",
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

        $('#amandemen_file').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('amandemen/file') !!}",
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

        $(document).on('click', '.btn-update-amandemen', function(e) {
            $('#e_id').val($(this).data('id'))
            $('#update-amandemen').modal('show')
        })

        $('#form_amandemen_update').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'post',
                url: "{!! url('amandemen/update') !!}",
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

        $(document).on('click', '.btn-delete-amandemen', function(e) {
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
                        url: "{{ url('amandemen-file/delete?id=') }}" + id,
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
