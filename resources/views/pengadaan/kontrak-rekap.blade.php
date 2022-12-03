@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{!! asset('daterangepicker/daterangepicker.css') !!}">
@endsection
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Rekap Kontrak</div>
                <div class="card-tools">
                    {{-- <a href="{{ url('manajemen-kontrak/rekap/export') }}" class="btn btn-success btn-round btn-sm mr-2">
                        <span class="btn-label">
                            <i class="fa fa-file-excel"></i>
                        </span>
                        Export
                    </a> --}}
                    
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form method="get" action="{{ url('manajemen-kontrak/rekap/export') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Unit</label>
                                    <div class="select2-input select2-warning mt-2">
                                        <select class="form-control" id="unit_id" name="unit_id" style="width: 100%" required>
                                            <option>semua</option>
                                            @foreach($unit as $un)
                                            <option value="{{ $un->id }}" {{ ($unit_select != null && $unit_select->id == $un->id) ? 'selected' : '' }}>{{ $un->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group form-group-default">
                                    <label for="exampleFormControlInput1">Penyedia Barang Jasa</label>
                                    <div class="select2-input select2-warning mt-2">
                                        <select class="form-control" id="mitra_id" name="mitra_id" style="width: 100%" required>
                                            <option>semua</option>
                                            @foreach($mitra as $item)
                                            <option value="{{ $item->id }}" {{ ($mitra_select != null && $mitra_select->id==$item->id) ? 'selected' : '' }}>{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="form-group form-group-default">
                            <label for="">Rentang Tanggal</label>
                            <input type="text" class="form-control" id="dr" readonly>
                        </div>
                        
                        
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Export</button>
                            <a href="{{ url('manajemen-kontrak/rekap') }}" class="btn btn-danger btn-sm">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table id="basic-datatables" class="display table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="10%">Deskrispi Pengadaan</th>
                            <th width="5%">Unit</th>
                            <th width="5%">Metode Pengadaan</th>
                            <th width="10%">Nama Vendor</th>
                            {{-- <th width="5%">No.Kontrak</th> --}}
                            <th width="5%">Nilai Kontrak</th>
                            <th width="5%">Tgl.Kontrak</th>
                            <th width="5%">Tgl.Akhir</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($rekap as $u)
                        <tr>
                            <td style="font-size: 9pt;">{{ $no ++ }}</td>
                            <td style="font-size: 9pt;">
                                <a href="{!! url('pengadaan/detail?id='.$u->peng_id."&tab=kontrak") !!}">
                                    {{ $u->peng_nama }}
                                </a>
                                {!! ($u->nomor_kontrak != null) ? "<br><br>".$u->nomor_kontrak."<br>".$u->unit_nama."<br>" : '' !!}
                                
                                @if($u->khs_pid != null)
                                <a href="{!! url('pengadaan/detail?id='.$u->khs_pid."&tab=pelaksana") !!}" class="khs_link">{!! 'KHS No : '.$u->khs_no ."<br><br>" !!}</a>
                                @else
                                <br>
                                @endif
                            </td>
                            <td style="font-size: 9pt;">{{ $u->unit_nama }}</td>
                            <td style="font-size: 9pt;">{{ $u->metode_pengadaan }}</td>
                            <td style="font-size: 9pt;">{{ $u->nama }}</td>
                            {{-- <td>{{ $p->pelaksanaan->nomor_kontrak }}</td> --}}
                            <td style="font-size: 9pt;" align="right">{{ number_format($u->nilai_kontrak) }}</td>
                            <td style="font-size: 9pt;">{{ $u->tgl_kontrak }}</td>
                            <td style="font-size: 9pt;">{{ $u->tgl_akhir }}</td>
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
<script src="{{ asset('public/atlantis/assets/js/plugin/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
<script src="{!! asset('daterangepicker/daterangepicker.js') !!}"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            pageLength:100
        });
    });
    
    $('#mitra_id').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });
    $('#unit_id').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });

    $('#dr').daterangepicker({
            timePicker: false,
            timePickerIncrement: 30,
            locale: {
                format: 'YYYY-MM-DD'
            }

    })

    @if($dr != null)
    var dr = "{{ $dr }}"
    $('#dr').val(dr)
    @else
    $('#dr').val('')
    @endif

    $(document).on('change','#dr', function(){
        var in_dr = $(this).val()
        console.log(in_dr)
        var unit_id = $('#unit_id').val()
        var mitra_id = $('#mitra_id').val()
    
        window.location = "{!! url('manajemen-kontrak/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+"&dr="+in_dr
    })
    
    $(document).on('change','#unit_id', function(){
        var unit_id = $(this).val()
        var mitra_id = $('#mitra_id').val()
        
        var in_dr = $('#dr').val()
        window.location = "{!! url('manajemen-kontrak/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+"&dr="+in_dr
        // console.log(mitra_id)
    })

    $(document).on('change','#mitra_id', function(){
        var mitra_id = $(this).val()
        var unit_id = $('#unit_id').val()
        
        var in_dr = $('#dr').val()
        window.location = "{!! url('manajemen-kontrak/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+"&dr="+in_dr
        // console.log(mitra_id)
    })
    
</script>

@endsection