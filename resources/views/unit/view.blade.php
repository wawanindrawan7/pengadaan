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
<div class="modal fade" id="create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form-create" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Unit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kota</label>
                        <input type="text" class="form-control" name="kota" id="exampleFormControlInput1" required>
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

<div class="modal fade" id="update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" name="nama" id="e_nama" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kota</label>
                        <input type="text" class="form-control" name="kota" id="e_kota" required>
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
                    <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal" data-target="#create-modal">
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
                            <th width="30%">Nama Unit</th>
                            <th width="10%">Kota</th>
                            <th width="3%">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($unit as $u)
                        <tr>
                            <td>{{ $no ++ }}</td>
                            <td>{{ $u->nama }}</td>
                            <td>{{ $u->kota }}</td>
                            <td align="center">
                                <a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update" data-id="{{ $u->id }}"
                                    data-nama="{{ $u->nama }}" data-kota="{{ $u->kota }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                @if(Auth::user()->status == 'Admin')
                                <a title="Delete" href="#" class="btn btn-danger btn-round btn-xs mr-2 btn-delete" data-id="{{ $u->id }}">
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
<script src="{{ asset('public/atlantis/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
        });
    });


    $('#form-create').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('unit/create') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon : "success",
                        buttons: {
                            confirm: {
                                className : 'btn btn-success'
                            }
                        },
                    }).then(function(){
                        location.reload()
                    });
                }
            }
        })
    });


    $(document).on('click','.btn-update', function(e){
        $('#e_id').val($(this).data('id'))
        $('#e_nama').val($(this).data('nama'))
        $('#e_kota').val($(this).data('kota'))
        $('#update-modal').modal('show')
    })

    $('#form-update').on('submit', function(e){
        e.preventDefault()
        $.ajax({
            type: 'post',
            url: "{!! url('unit/update') !!}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (r) {
                console.log(r)
                if (r == 'success') {
                    swal("Good job!", "Simpan data berhasil !", {
                        icon : "success",
                        buttons: {
                            confirm: {
                                className : 'btn btn-success'
                            }
                        },
                    }).then(function(){
                        location.reload()
                    });
                }
            }
        })
    });



    $(document).on('click','.btn-delete', function(e){
        var id = $(this).data('id')
        e.preventDefault()
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            buttons:{
                confirm: {
                    text : 'Yes, delete it!',
                    className : 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {
                $.ajax({
                    type : 'GET',
                    url : "{{ url('unit/delete?id=') }}"+id,
                    success : function(r){
                        if(r == 'success'){
                            swal({
                                title: 'Deleted!',
                                text: 'Your file has been deleted.',
                                type: 'success',
                                buttons : {
                                    confirm: {
                                        className : 'btn btn-success'
                                    }
                                }
                            }).then(function(){
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
