@extends('layouts.master')
{{-- @section('page-header')
<h4 class="page-title">Barang</h4>
<ul class="breadcrumbs">
    <li class="nav-home">
        <a href="#">
            <i class="flaticon-home"></i>
        </a>
    </li>
    <li class="separator">
        <i class="flaticon-right-arrow"></i>
    </li>
    <li class="nav-item">
        <a href="#">Barang</a>
    </li>

</ul>
@endsection --}}
@section('content')
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-create" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Usulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <select name="unit_id" class="form-control">
                            @foreach ($unit as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Pekerjaan</label>
                        <input type="text" class="form-control" name="jenis_pekerjaan" id="exampleFormControlInput1"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="exampleFormControlInput1" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="exampleFormControlInput1" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="exampleFormControlInput1" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Surat Usulan</label>
                        <input type="text" class="form-control" name="no_surat_usulan" id="exampleFormControlInput1"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Usulan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="datepicker" name="tgl_usulan">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor PR</label>
                        <input type="text" class="form-control" name="no_pr" id="exampleFormControlInput1"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="exampleFormControlInput1"
                            required>
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
                    <h5 class="modal-title" id="exampleModalLabel">Update Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input type="hidden" name="id" id="e_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <select name="unit_id" class="form-control" id="e_unit_id">
                            @foreach ($unit as $u)
                            <option value="{{ $u->id }}">{{ $u->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="e_deskripsi" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Pekerjaan</label>
                        <input type="text" class="form-control" name="jenis_pekerjaan" id="e_jenis_pekerjaan"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="e_kategori" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipe</label>
                        <input type="text" class="form-control" name="tipe" id="e_tipe" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai</label>
                        <input type="number" class="form-control" name="nilai" id="e_nilai" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Surat Usulan</label>
                        <input type="text" class="form-control" name="no_surat_usulan" id="e_no_surat_usulan"
                            required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Usulan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="e_datepicker" name="tgl_usulan">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor PR</label>
                        <input type="text" class="form-control" name="no_pr" id="e_no_pr"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="e_keterangan"
                            required>
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
                    {{-- <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                        <span class="btn-label">
                            <i class="fa fa-print"></i>
                        </span>
                        Print
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="basic-datatables" class="display table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th>Nama Unit</th>
                            <th>Deskripsi</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th>Nilai</th>
                            <th>Nomor Surat Usulan</th>
                            <th>Tanggal Usulan</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($usulan as $u)
                        <tr>
                            <td>{{ $no ++ }}</td>
                            <td>{{ $u->unit->nama }}</td>
                            <td>{{ $u->deskripsi }}</td>
                            <td>{{ $u->jenis_pekerjaan }}</td>
                            <td>{{ $u->kategori }}</td>
                            <td>{{ $u->tipe }}</td>
                            <td>{{ $u->nilai }}</td>
                            <td>{{ $u->no_surat_usulan }}</td>
                            <td>{{ $u->tgl_usulan }}</td>
                            <td align="center">
                                <a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update"
                                    data-id="{{ $u->id }}" data-unit_id="{{ $u->unit_id }}" data-deskripsi="{{ $u->deskripsi }}" data-jenis_pekerjaan="{{ $u->jenis_pekerjaan }}" data-kategori="{{ $u->kategori }}" data-tipe="{{ $u->tipe }}" data-nilai="{{ $u->nilai }}" data-no_surat_usulan="{{ $u->no_surat_usulan }}" data-tgl_usulan="{{ $u->tgl_usulan }}" data-no_pr="{{ $u->no_pr }}" data-keterangan="{{ $u->keterangan }}">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a title="Delete" href="#" class="btn btn-danger btn-round btn-xs mr-2 btn-delete"
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
    $(document).ready(function () {
        $('#basic-datatables').DataTable({});
    });

    $('#datepicker').datetimepicker({
        format: 'MM/DD/YYYY',
    });


    $('#e_datepicker').datetimepicker({
        format: 'MM/DD/YYYY',
    });


    $('#form-create').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('usulan/create') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function () {
                        location.reload()
                    });
                }
            }
        })
    });


    $(document).on('click', '.btn-update', function (e) {
        $('#e_id').val($(this).data('id'))
        $('#e_unit_id').val($(this).data('unit_id'))
        $('#e_deskripsi').val($(this).data('deskripsi'))
        $('#e_jenis_pekerjaan').val($(this).data('jenis_pekerjaan'))
        $('#e_kategori').val($(this).data('kategori'))
        $('#e_tipe').val($(this).data('tipe'))
        $('#e_nilai').val($(this).data('nilai'))
        $('#e_no_surat_usulan').val($(this).data('no_surat_usulan'))
        $('#e_datepicker').val($(this).data('tgl_usulan'))
        $('#e_no_pr').val($(this).data('no_pr'))
        $('#e_keterangan').val($(this).data('keterangan'))
        $('#update-modal').modal('show')
    })

    $('#form-update').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('usulan/update') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon: "success",
                        buttons: {
                            confirm: {
                                className: 'btn btn-success'
                            }
                        },
                    }).then(function () {
                        location.reload()
                    });
                }
            }
        })
    });



    $(document).on('click', '.btn-delete', function (e) {
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
                    url: "{{ url('usulan/delete?id=') }}" + id,
                    success: function (r) {
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
                            }).then(function () {
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
