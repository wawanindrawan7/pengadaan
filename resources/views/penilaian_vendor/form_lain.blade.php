@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Form Penilaian Lain</div>
                </div>
            </div>
            <div class="card-body">
                <form id="create">
                    @csrf
                    <input type="hidden" name="pelaksanaan_id" value="{{ $pel->id }}">
                    <input type="hidden" name="form" value="Supply Only">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="text" name="tgl_penilaian" required class="form-control date">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">DPT / Non DPT</label>
                                <select class="form-control" name="dpt_non_dpt" required>
                                    <option value=""></option>
                                    <option>DPT Jasa Konstruksi JTM, Gardu Distribusi dan JTR</option>
                                    <option>DPT Jasa Konstruksi SR dan APP</option>
                                    <option>DPT Jasa Grinding dan Polishing Crankshaft Mesin Diesel</option>
                                    <option>DPT Jasa Rekondisi Sparepart Mesin Diesel</option>
                                    <option>Non DPT</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="hidden" id="mode" name="mode">
                        <input type="hidden" id="id" name="tid">
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="">Kriteria</label>
                                <input type="text" class="form-control" id="kriteria" name="kriteria">
                            </div>
                        </div>
                    
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="">Nilai</label>
                                <input type="number" class="form-control" name="nilai"
                                    id="nilai">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mt-1">
                                {{-- <label for="">Nilai</label> --}}
                                <button type="button" class="btn btn-success form-control mt-4 btn-add-item">Tambah Item</button>
                            </div>
                        </div>

                        
                    </div>
                    
                    
                    
                    <div class="form-group">
                        <a href="#" id="btn-reset">Reset</a>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="1%">NO</th>
                                            <th width="15%">KRITERIA PENILAIAN</th>
                                            <th width="5%">NILAI</th>
                                            <th width="3%">OPT</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tb">

                                    </tbody>
                                    <tfoot id="tfoot">

                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>

                    <input type="hidden" name="total" id="total">
                    <input type="hidden" name="kategori" id="kategori">
                    

                    
                    <div class="form-group">
                        <label for="">Keterangan</label>
                        <textarea type="text" name="ket" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Save</button>
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
<script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script>
    $('.date').datetimepicker({
        format: 'YYYY-MM-DD',
    });

    loadItem()

    function loadItem(){
        $('.btn-add-item').text('Tambah Item')
        $('#mode').val('add')
        $('#kriteria').val('')
        $('#nilai').val('')
        $.ajax({
            type : "get",
            data : {
                id : "{{ $pel->id }}"
            },
            url : "{{ url('penilaian/form-lain/load-temp') }}",
            success : function(r){
                console.log(r)
                $('#tb').empty()
                $.each(r.temp, function(i, d){
                    $('#tb').append(
                        '<tr>\
                            <td>'+(i + 1)+'</td>\
                            <td>'+d.kriteria+'</td>\
                            <td align="center">'+d.nilai+'</td>\
                            <td align="center">\
                                <a class="btn btn-warning btn-xs btn-edit" data-id="'+d.id+'" data-kriteria="'+d.kriteria+'" data-nilai="'+d.nilai+'">Edit</a>\
                                <a class="btn btn-danger btn-xs btn-delete" data-id="'+d.id+'">Delete</a>\
                            </td>\
                        </tr>'
                    )
                })
                if(r.temp.length > 0){
                    $('#total').val(r.total)
                    $('#kategori').val(r.kategori)
                    $('#tb').append(
                        '<tr>\
                            <th colspan="2">TOTAL</th>\
                            <th style="text-align:center">'+r.total+'</th>\
                        </tr>\
                        <tr>\
                            <th colspan="2">KATEGORI</th>\
                            <th style="text-align:center">'+r.kategori+'</th>\
                        </tr>'
                    )
                }
            }
        })
    }

    $(document).on('click','#btn-reset', function(e){
        $('.btn-add-item').text('Tambah Item')
        $('#mode').val('add')
        $('#kriteria').val('')
        $('#nilai').val('')
    })

    $(document).on('click','.btn-edit', function(e){
        e.preventDefault()
        $('.btn-add-item').text('Edit')
        var id = $(this).data('id')
        var kriteria = $(this).data('kriteria')
        var nilai = $(this).data('nilai')

        $('#mode').val('edit')
        $('#id').val(id)
        $('#kriteria').val(kriteria)
        $('#nilai').val(nilai)
    })

    $(document).on('click','.btn-add-item', function(){
        var mode = $('#mode').val()
        var tid = $('#id').val()
        var kriteria = $('#kriteria').val()
        var nilai = $('#nilai').val()
        if(kriteria === '' || nilai === ''){
            swal("Ops !", "Inputan tidak lengkap !", {
                icon: "error",
                timer: 1500,
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            })
        }else{
            $.ajax({
                type : 'get',
                url : "{{ url('penilaian/form-lain/add-item') }}",
                data : {
                    kriteria : kriteria, nilai : nilai, id : "{{ $pel->id }}", tid:tid,mode:mode
                },
                success : function(r){
                    console.log(r)

                    if(r !== 'success'){
                        swal("Ops !", "Nilai lebih dari 100 !", {
                            icon: "error",
                            timer: 1500,
                            buttons: {
                                confirm: {
                                    className: 'btn btn-danger'
                                }
                            },
                        })
                    }else{
                        loadItem()
                    }
                }
            })
        }
    })

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
                    url: "{{ url('penilaian/form-lain/del-item?id=') }}" + id,
                    success: function (r) {
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
                            }).then(function () {
                                // location.reload()
                                loadItem()
                            });
                        }
                    }
                })

            } else {
                swal.close();
            }
        });

    })

    $('#create').on('submit', function (e) {
        e.preventDefault()
        $.ajax({
            type: 'POST',
            url: "{!! url('penilaian/form-lain/create') !!}",
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
                        window.location = "{!! url('pengadaan/detail?id=' . $pel->pengadaan_id.'&tab=kontrak') !!}";
                    });
                }
            }
        })
    });

</script>
@endsection
