@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Form Perencana Pengadaan</div>
                <div class="card-tools">
                    <a href="{{ url('perencana-pengadaan/detail?id='.$pengadaan->id) }}" class="btn btn-info btn-round btn-sm mr-2">
                        <span class="btn-label">
                            <i class="fa fa-arrow-left"></i>
                        </span>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form id="form_create">
                @csrf
                <input type="hidden" name="pengadaan_id" value="{{ $pengadaan->id }}">
                <div class="form-group form-group-default">
                    <label for="exampleFormControlInput1">Nama Pengadaan</label>
                    <textarea class="form-control" name="nama" rows="1" readonly>{{ $pengadaan->nama }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Kategori Kebutuhan</label>
                            <select name="kategori_kebutuhan" class="form-control" required>
                                <option>Rutin</option>
                                <option>Leverage</option>
                                <option>Critical</option>
                                <option>Strategis</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Tanggal Penggunaan</label>
                            <input type="text" class="form-control date" name="tgl_penggunaan" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Waktu Pelaksanaan</label>
                            <input type="text" class="form-control" name="waktu_pelaksanaan" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Strategi Pengadaan</label>
                            <select name="strategi_pengadaan" class="form-control" required>
                                <option>Sentralisasi unit induk</option>
                                <option>Dilaksanakan unit pelaksana</option>
                                <option>JPROC</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Jenis Kontrak</label>
                            <select name="jenis_kontrak" class="form-control" required>
                                <option>Lumsum</option>
                                <option>Harga satuan</option>
                                <option>Gabungan lumsum & harga satuan</option>
                                <option>KHS</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nilai HPE</label>
                            <div class="input-group">
                                <input type="number" id="nilai_hpe" autocomplete="off" name="nilai_hpe" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                <div class="input-group-append">
                                    <span class="input-group-text f_nilai_hpe"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Tanggal HPE</label>
                            <input type="text" class="form-control date" name="tgl_hpe" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nomor RKS</label>
                            <input type="text" class="form-control" name="nomor_rks" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Tanggal RKS</label>
                            <input type="text" class="form-control date" name="tgl_rks" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                            <input type="text" class="form-control" name="no_nota_dinas" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Tanggal Nota Dinas</label>
                            <input type="text" class="form-control date" name="tgl_nota_dinas" required>
                        </div>
                    </div>
                </div>


                <div class="form-group form-group-default bg-info text-white">
                   <label for=""><b class="text-white">HPE ITEM</b></label>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Nama Item</label>
                            <input type="text" class="form-control" id="item" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Satuan</label>
                            <input type="text" class="form-control" id="satuan" required>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Vol 1</label>
                            <input type="text" class="form-control" id="vol_1" required>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Vol 2</label>
                            <input type="text" class="form-control" id="vol_2" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Harga Satuan</label>
                            <input type="text" class="form-control" id="harga_satuan" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group form-group-default">
                            <label for="exampleFormControlInput1">Jumlah</label>
                            <input type="text" class="form-control" id="f_jumlah" readonly>
                            <input type="hidden" class="form-control" id="jumlah">
                        </div>
                    </div>
                </div>
                
              
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm" id="btn-add-item">Tambah Item</button>
                </div>

                

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-bordered-bd-info">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" rowspan="2" >#</th>
                                    <th style="text-align: center;" rowspan="2" >Nama Item</th>
                                    <th style="text-align: center;" rowspan="2" >Satuan</th>
                                    <th style="text-align: center;" rowspan="2" colspan="2" >Vol</th>
                                    <th style="text-align: center;"  colspan="2">Nilai Pekerjaan</th>
                                    <th style="text-align: center;"  rowspan="2">Option</th>

                                </tr>
                                <tr>
                                    <th style="text-align: center;">Harga Satuan</th>
                                    <th style="text-align: center;">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="6">TOTAL</th>
                                    <th id="total_hpe" style="text-align: right"></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button id="btn-submit" class="btn btn-success">SUBMIT DATA PERENCANA PENGADAAN</button>
        </div>

    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script>
    $('.date').datetimepicker({
        format: 'MM/DD/YYYY',
    });

    $(document).on('input','#nilai_hpe', function(){
        var nilai_hpe = $('#nilai_hpe').val()
        $('.f_nilai_hpe').text(nf.format(nilai_hpe))
    })

    function countJumlah(){
        var vol_1 = $('#vol_1').val()
        var vol_2 = $('#vol_2').val()
        var harga_satuan = $('#harga_satuan').val()

        var jumlah = 0

        if(vol_2 == ''){
            jumlah = vol_1 * harga_satuan
        }else{
            jumlah = vol_1 * vol_2 * harga_satuan
        }
        $('#jumlah').val(jumlah)
        $('#f_jumlah').val(nf.format(jumlah))

    }

    function resetForm(){
        $('#item').val('')
        $('#satuan').val('')
        $('#vol_1').val('')
        $('#vol_2').val('')
        $('#harga_satuan').val('')
        $('#jumlah').val('')
        $('#f_jumlah').val('')
    }

    $(document).on('input','#vol_1', function(){
        countJumlah()
    })
    $(document).on('input','#vol_2', function(){
        countJumlah()
    })
    $(document).on('input','#harga_satuan', function(){
        countJumlah()
    })

    loadItem()

    function loadItem(){
        $.ajax({
            type : 'get',
            url : "{{ url('hpe/load-item?pengadaan_id='.$pengadaan->id) }}",
            success : function(r){
                $('#tbody').empty()
                var total = 0
                $.each(r.item, function(i, d){
                    total += d.jumlah
                    var vol = ''
                    if(d.vol_1 === null && d.vol_2 !== null){
                        vol = '<td width="5%" align="center" colspan="2">'+d.vol_2+'</td>'
                    }else if(d.vol_2 === null && d.vol_1 !== null){
                        vol = '<td width="5%" align="center" colspan="2">'+d.vol_1+'</td>'
                    }else{
                        vol = '<td width="5%" align="center">'+d.vol_1+'</td><td width="5%" align="center">'+d.vol_2+'</td>'
                    }
                    $('#tbody').append(
                        '<tr>\
                            <td width="1%">'+(i+1)+'</td>\
                            <td width="10%">'+d.item+'</td>\
                            <td width="5%">'+d.satuan+'</td>'
                            +vol+
                            '<td width="5%" align="right">'+nf.format(d.harga_satuan)+'</td>\
                            <td width="5%" align="right">'+nf.format(d.jumlah)+'</td>\
                            <td width="1%" align="center">\
                                <a href="#" class="btn-delete-item" data-id="'+d.id+'"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>\
                            </td>\
                        </tr>'
                    )
                })

                $('#total_hpe').text(nf.format(total))
                resetForm()
                
            }
        })
    }

    $(document).on('click','#btn-add-item', function(e){
        e.preventDefault()
        var item = $('#item').val()
        var satuan = $('#satuan').val()
        var vol_1 = $('#vol_1').val()
        var vol_2 = $('#vol_2').val()
        var harga_satuan = $('#harga_satuan').val()
        var jumlah = $('#jumlah').val()
        if(item === '' || satuan === '' || vol_1 === '' || harga_satuan == ''){
            swal({
                title: 'Ops!',
                text: 'Inputan tidak lengkap',
                type: 'error',
                timer : 1000,
                buttons: {
                    confirm: {
                        className: 'btn btn-warning'
                    }
                }
            })
        }else{
            $.ajax({
                type : 'POST',
                url : "{{ url('hpe/add-item') }}",
                data : {
                    _token : "{{ csrf_token() }}",
                    pengadaan_id : "{{ $pengadaan->id }}",
                    item : item,
                    satuan : satuan,
                    vol_1 : vol_1,
                    vol_2 : vol_2,
                    harga_satuan : harga_satuan,
                    jumlah : jumlah,
                },
                success : function(r){
                    if(r == 'success'){
                        loadItem()
                    }
                }
            })
        }
    })

    $(document).on('click', '#btn-submit', function (e) {
        var id = $(this).data('id')
        e.preventDefault()
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'success',
            buttons: {
                confirm: {
                    text: 'Yes, submit it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Submit) => {
            if (Submit) {
                $('#form_create').submit()
            } else {
                swal.close();
            }
        });
    })

    $('#form_create').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('perencana-pengadaan/create') !!}",
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
                            window.location = "{{ url('perencana-pengadaan/detail?id='.$pengadaan->id) }}"
                        });
                    }
                }
            })
        });

    $(document).on('click', '.btn-delete-item', function (e) {
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
                    url: "{{ url('hpe/delete-item?id=') }}" + id,
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
</script>
@endsection