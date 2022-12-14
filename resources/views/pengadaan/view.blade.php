@extends('layouts.master')
@section('css')
    <style>
        th {
            font-size: 11px;
        }

        td {
            font-size: 11px;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="create-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form-create" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create Pengadaan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if(Auth::user()->status == 'Admin')
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Unit Inisiator</label>
                            <select name="unit_id" class="form-control">
                                <option value=""></option>
                                @foreach ($unit as $ui)
                                    <option value="{{ $ui->id }}">{{ $ui->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nama Pengadaan</label>
                            <textarea class="form-control" name="nama" rows="3" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Lokasi</label>
                                    <select name="lokasi" class="form-control">
                                        <option value=""></option>
                                        @foreach ($unit as $un)
                                            <option>{{ $un->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Sumber Anggaran</label>
                                    <select name="sumber_anggaran" class="form-control">
                                        <option>Operasi</option>
                                        <option>Investasi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Nilai Anggaran (RAB)</label>
                                    <div class="input-group">
                                        <input type="number" id="nilai_anggaran" autocomplete="off" name="nilai_anggaran"
                                            class="form-control" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text f_nilai_anggaran"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Jenis</label>
                                    <select name="jenis" class="form-control">
                                        <option>Barang</option>
                                        <option>Jasa</option>
                                        <option>Barang & Jasa</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Volume</label>
                                    <input type="text" class="form-control" name="volume" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Metode Pengadaan</label>
                                    <select name="metode_pengadaan" id="metode_pengadaan" class="form-control">
                                        <option>Pengadaan Langsung</option>
                                        <option>Penunjukan Langsung</option>
                                        <option>Tender Terbatas</option>
                                        <option>Tender Terbuka</option>
                                        <option>Kontrak Rinci</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="no-kontrak-blok">
                            
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                                    <input type="text" class="form-control" name="no_nota_dinas" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Tanggal Nota Dinas</label>
                                    <input type="text" class="form-control date" name="tgl_nota_dinas" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Direksi Pekerjaan</label>
                            <div class="select2-input select2-warning mt-2">
                                <select name="direksi_pk_id" id="direksi_pk_id" style="width: 100%" class="form-control">
                                    <option value=""></option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Pengawas Pekerjaan</label>
                            <div class="select2-input select2-warning mt-2">
                                <select name="pengawas_pk_id" id="pengawas_pk_id" style="width: 100%" class="form-control">
                                    <option value=""></option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Pengawas K3</label>
                            <div class="select2-input select2-warning mt-2">
                                <select name="pengawas_k3_id" id="pengawas_k3_id" style="width: 100%"
                                    class="form-control">
                                    <option value=""></option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">User Komite Value For Money</label>
                            <div class="select2-input select2-warning mt-2">
                                <select name="users_komite_id[]" id="users_komite" multiple="multiple"
                                    class="form-control" style="width: 100%" required>
                                    <option value=""></option>
                                    @foreach ($user as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="import-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_import" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Import Pengadaan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">File Import</label>
                            <input type="file" class="form-control" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Data Pengadaan</div>
                    <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                            data-target="#create-modal">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Create
                        </a>

                        @if(Auth::user()->status == 'Admin')
                        <a href="#" class="btn btn-success btn-border btn-round btn-sm mr-2" data-toggle="modal"
                            data-target="#import-modal">
                            <span class="btn-label">
                                <i class="fa fa-upload"></i>
                            </span>
                            Import Excel
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="1%">No.</th>
                                <th>Nama</th>
                                {{-- <th>No.Kontrak</th> --}}
                                <th>Vendor</th>
                                <th>Lokasi</th>
                                <th>Detail Proses</th>
                                {{-- <th>Sumber Anggaran</th> --}}
                                <th>Nilai Anggaran</th>
                                {{-- <th>Jenis</th> --}}
                                {{-- <th>Volume</th> --}}
                                {{-- <th>Metode Pengadaan</th> --}}
                                {{-- <th>Nomor Nota Dinas</th>
                                <th>Tanggal Nota Dinas</th> --}}
                                {{-- <th>User</th> --}}
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
                                    <td>
                                        {!! $u->nama !!}
                                        {!! ($u->pelaksanaan != null) ? "<br><br>No.Kontrak : ".$u->pelaksanaan->nomor_kontrak."<br>" : '' !!}
                                        @if($u->khs_pid != null)
                                        <a href="{!! url('pengadaan/detail?id='.$u->khs_pid."&tab=pelaksana") !!}" class="khs_link">{!! 'KHS No : '.$u->khs_no ."<br><br>" !!}</a>
                                        @else
                                        <br>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $u->pelaksanaan != null ? $u->pelaksanaan->mitra->nama : '' }}
                                    </td>
                                    <td>{{ $u->unit->nama }}</td>
                                    <td>
                                        @if (Auth::id() == $u->users_id ||
                                            Auth::user()->kategori == 'Perencana' ||
                                            Auth::user()->kategori == 'Pelaksana' ||
                                            Auth::user()->status == 'Admin')
                                            <a href="{!! url('pengadaan/detail?id=' . $u->id . '&tab=inisiasi') !!}"><span
                                                    class="badge bg-success text-white mt-2">Inisiasi</span></a>
                                            <br>
                                        @endif

                                        @if ((Auth::id() == $u->users_id ||
                                            Auth::user()->kategori == 'Perencana' ||
                                            Auth::user()->kategori == 'Pelaksana' ||
                                            Auth::user()->status == 'Admin') &&
                                            $u->state >= 1)
                                            <a href="{!! url('pengadaan/detail?id=' . $u->id . '&tab=perencana') !!}"><span
                                                    class="badge bg-info text-white mt-2">Perencana</span></a>
                                            <br>
                                        @endif
                                        @if ((Auth::id() == $u->users_id ||
                                            Auth::user()->kategori == 'Perencana' ||
                                            Auth::user()->kategori == 'Pelaksana' ||
                                            Auth::user()->status == 'Admin') &&
                                            $u->state >= 2)
                                            <a href="{!! url('pengadaan/detail?id=' . $u->id . '&tab=pelaksana') !!}"><span
                                                    class="badge bg-danger text-white mt-2">Pelaksana</span></a>
                                            <br>
                                        @endif

                                        @if ((Auth::id() == $u->users_id ||
                                            Auth::user()->kategori == 'Perencana' ||
                                            Auth::user()->kategori == 'Pelaksana' ||
                                            Auth::user()->status == 'Admin' ||
                                            Auth::id() == $u->direksiPk->users_id ||
                                            Auth::id() == $u->pengawasPk->users_id ||
                                            Auth::id() == $u->pengawasK3->users_id) &&
                                            $u->state >= 3)
                                            <a href="{!! url('pengadaan/detail?id=' . $u->id . '&tab=kontrak') !!}"><span
                                                    class="badge bg-primary text-white mt-2">Manajemen Kontrak</span></a>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $u->sumber_anggaran }}</td> --}}
                                    <td>{{ number_format($u->nilai_anggaran) }}</td>
                                    {{-- <td>{{ $u->jenis }}</td> --}}
                                    {{-- <td>{{ $u->volume }}</td> --}}
                                    {{-- <td>{{ $u->metode_pengadaan }}</td> --}}
                                    {{-- <td>{{ $u->users->name }}</td> --}}
                                    {{-- <td>{{ $u->no_nota_dinas }}</td>
                                    <td>{{ $u->tgl_nota_dinas }}</td> --}}
                                    <td align="center">
                                        {{-- <a title="Update" href="#"
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
                                        </a> --}}

                                        @if ((Auth::id() == $u->users_id && $u->state == 0) || Auth::user()->status == 'Admin')
                                            <a title="Delete" href="#"
                                                class="btn btn-danger btn-round btn-xs mr-2 btn-delete"
                                                data-id="{{ $u->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
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
    <script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/select2/select2.full.min.js') }}"></script>

    <script>
        $('#users_komite').select2({
            theme: "bootstrap"
        });
        $('#direksi_pk_id').select2({
            theme: "bootstrap"
        });
        $('#pengawas_pk_id').select2({
            theme: "bootstrap"
        });
        $('#pengawas_k3_id').select2({
            theme: "bootstrap"
        });





        $('.date').datetimepicker({
            format: 'MM/DD/YYYY',
        });

        $(document).ready(function() {
            $('#basic-datatables').DataTable({
                pageLength: 100,
                ordering: false,
            });
        });

        $(document).on('change','#metode_pengadaan', function(e){
            var metode_pengadaan = $(this).val()
            if(metode_pengadaan === 'Kontrak Rinci'){
                $('.no-kontrak-blok').append(
                    '<div class="form-group form-group-default">\
                        <label>No. Kontrak KHS</label>\
                        <select class="form-control" id="no_kontrak" name="khs_pid" style="width:100%" required></select>\
                    </div>'
                )


                loadKhsKontrak()


            }else{
                $('.no-kontrak-blok').empty()
            }
        })

        function loadKhsKontrak(){
            $.ajax({
                type : 'GET',
                url : "{{ url('perencana-pengadaan/load-khs-kontrak') }}",
                success : function(r){
                    console.log(r)
                    $('#no_kontrak').empty()
                    $('#no_kontrak').append('<option value=""></option>')

                    $.each(r.kontrak, function(i, d){
                        $('#no_kontrak').append('<option value="'+d.id+'">'+d.pelaksanaan.nomor_kontrak+' / '+d.nama+' / '+d.pelaksanaan.mitra.nama+'</option>')
                    })

                    $('#no_kontrak').select2({
                        theme: "bootstrap"
                    });
                }
            })
        }




        $(document).on('input', '#nilai_anggaran', function() {
            var nilai_anggaran = $('#nilai_anggaran').val()
            $('.f_nilai_anggaran').text(nf.format(nilai_anggaran))
        })


        $('#form_import').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pengadaan/import') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    console.log(r)
                    console.log(r.msg)
                    if (r.res == 'success') {
                        swal("Good job!", "Simpan data berhasil !", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            window.location = "{!! url('pengadaan') !!}"
                        });
                    }else{
                        swal("Ops !", r.msg, {
                            icon: "error",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        })
                    }
                }
            })
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
                    if (r.res == 'success') {
                        swal("Good job!", "Simpan data berhasil !", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            window.location = "{!! url('pengadaan/detail?id=') !!}"+r.id+'&tab=inisiasi'
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
                            console.log(r)
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
