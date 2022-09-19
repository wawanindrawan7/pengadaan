@extends('layouts.master')

@section('content')
    <div class="modal fade" id="create-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_user">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Create User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">NIP</label>
                            <input type="text" class="form-control" name="nip" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. Whatsapp</label>
                            <input type="text" class="form-control" name="no_wa" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jabatan</label>
                            <select class="form-control" name="status" required>
                                <option value=""></option>
                                @foreach ($jabatan as $j)
                                    <option>{{ $j->status }}</option>
                                @endforeach
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori</label>
                            <select class="form-control" name="status">
                                <option value=""></option>
                                <option>Perencana</option>
                                <option>Pelaksana</option>
                                <option>Admin Unit</option>
                            </select>
                        </div> 

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit</label>
                            <select class="form-control" name="unit_id" required>
                                <option value=""></option>
                                @foreach ($unit as $un)
                                    <option value="{{ $un->id }}">{{ $un->nama }}</option>
                                @endforeach
                            </select>
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

    <div class="modal fade" id="update-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_user_update">
                    @csrf
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Update User</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="e_id">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name="name" id="e_name" required>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">NIP</label>
                            <input type="text" class="form-control" name="nip" id="e_nip">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" class="form-control" name="email" id="e_email" required>
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlInput1">No. Whatsapp</label>
                            <input type="text" class="form-control" name="no_wa" id="e_no_wa">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Jabatan</label>
                            <select class="form-control" name="status" id="e_status">
                                <option value=""></option>
                                <option>Admin</option>
                                @foreach ($jabatan as $j)
                                    <option>{{ $j->status }}</option>
                                @endforeach
                            </select>
                        </div> 

                        {{-- <div class="form-group">
                            <label for="exampleFormControlInput1">Unit</label>
                            <select class="form-control" name="unit_id" id="e_unit_id" required>
                                <option value=""></option>
                                @foreach ($unit as $un)
                                    <option value="{{ $un->id }}">{{ $un->nama }}</option>
                                @endforeach
                            </select>
                        </div>  --}}

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kategori</label>
                            <select class="form-control" name="kategori" id="e_kategori">
                                <option value=""></option>
                                <option>Perencana</option>
                                <option>Pelaksana</option>
                                <option>Admin Unit</option>
                            </select>
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

    <div class="modal fade" id="pointing-unit-create-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_pointing_unit_create">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pointing Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="users_id" id="u_id">

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" name="name" id="u_name" readonly>
                        </div>

                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Unit</label>
                            <select class="form-control" name="unit_id" required>
                                <option value=""></option>
                                @foreach ($unit as $un)
                                    <option value="{{ $un->id }}">{{ $un->nama }}</option>
                                @endforeach
                            </select>
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

    <div class="modal fade" id="pointing-unit-update-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_pointing_unit_update">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pointing Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="pu_id">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" id="pu_name" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Unit</label>
                            <select class="form-control" name="unit_id" id="pu_unit_id" required>
                                <option value=""></option>
                                @foreach ($unit as $un)
                                    <option value="{{ $un->id }}">{{ $un->nama }}</option>
                                @endforeach
                            </select>
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

    <div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="form_update_password">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="pass_id">

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" class="form-control" id="pass_name" readonly>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="password" class="form-control" name="password" required>
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
                            data-target="#create-user">
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
                                <th>NIP</th>
                                <th>Email</th>
                                <th>Jabatan</th>
                                <th>Kategori</th>
                                <th>No. Whatsap</th>
                                <th>Unit</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->nip }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->status }}</td>
                                    <td>{{ $u->kategori }}</td>
                                    <td>{{ $u->no_wa }}</td>
                                    <td>
                                        @if ($u->usersUnit != null)
                                        <a title="Unit" href="#"
                                            class="btn btn-info btn-round btn-xs mr-2 btn-unit-update"
                                            data-id="{{ $u->usersUnit->id }}" data-unit_id="{{ $u->usersUnit->unit_id }}" data-name="{{ $u->name }}">{{ $u->usersUnit->unit->nama }}
                                        </a>
                                        @else
                                        <a title="Unit" href="#"
                                            class="btn btn-success btn-round btn-xs mr-2 btn-unit-create"
                                            data-id="{{ $u->id }}" data-name="{{ $u->name }}">Pointing Unit
                                        </a>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <a title="Update" href="#"
                                            class="btn btn-warning btn-round btn-xs mr-2 btn-update"
                                            data-id="{{ $u->id }}" data-name="{{ $u->name }}" data-email="{{ $u->email }}" data-kategori="{{ $u->kategori }}" data-status="{{ $u->status }}" data-nip="{{ $u->nip }}" data-no_wa="{{ $u->no_wa }}"
                                            data-unit_id="{{ $u->usersUnit != null ? $u->usersUnit->unit_id : '' }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a title="Update Password" href="#"
                                            class="btn btn-info btn-round btn-xs mr-2 btn-update-password"
                                            data-name="{{ $u->name }}" data-id="{{ $u->id }}">
                                            <i class="fa fa-key"></i>
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

    <script>
        $(document).ready(function() {
            $('#basic-datatables').DataTable({
                pageLength:100
            });
        });

        $(document).on('click','.btn-update-password', function(e){
            e.preventDefault()
            $('#pass_id').val($(this).data('id'))
            $('#pass_name').val($(this).data('name'))

            $('#password-modal').modal('show')
        })

        $('#form_update_password').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('users/update-password') !!}",
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

        $(document).on('click','.btn-unit-create', function(e){
            e.preventDefault()
            $('#u_id').val($(this).data('id'))
            $('#u_name').val($(this).data('name'))

            $('#pointing-unit-create-modal').modal('show')
        })

        $(document).on('click','.btn-unit-update', function(e){
            e.preventDefault()
            $('#pu_id').val($(this).data('id'))
            $('#pu_name').val($(this).data('name'))
            $('#pu_unit_id').val($(this).data('unit_id'))

            $('#pointing-unit-update-modal').modal('show')
        })

        $('#form_pointing_unit_create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('users/pointing-unit/create') !!}",
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

        $('#form_pointing_unit_update').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('users/pointing-unit/update') !!}",
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

        $(document).on('click','.btn-update', function(e){
            e.preventDefault()
            $('#e_id').val($(this).data('id'))
            $('#e_name').val($(this).data('name'))
            $('#e_email').val($(this).data('email'))
            $('#e_unit_id').val($(this).data('unit_id'))
            $('#e_nip').val($(this).data('nip'))
            $('#e_no_wa').val($(this).data('no_wa'))
            $('#e_status').val($(this).data('status'))
            $('#e_kategori').val($(this).data('kategori'))

            $('#update-user').modal('show')
        })

        $('#form_user').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('users/create') !!}",
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

        $('#form_user_update').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('users/update') !!}",
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
                        url: "{{ url('users/delete?id=') }}" + id,
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
