@extends('layouts.master')
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Statistik Proses Penilaian</div>
                    {{-- <div class="card-category">Daily information about statistics in system</div> --}}
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="selesai"></div>
                            <h6 class="fw-bold mt-3 mb-0">Selesai</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="sudah_dinilai"></div>
                            <h6 class="fw-bold mt-3 mb-0">Sudah Dinilai</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="belum_dinilai"></div>
                            <h6 class="fw-bold mt-3 mb-0">Belum Dinilai</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Statistik Hasil Penilaian</div>
                    {{-- <div class="card-category">Daily information about statistics in system</div> --}}
                    <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="baik"></div>
                            <h6 class="fw-bold mt-3 mb-0">Baik</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="cukup"></div>
                            <h6 class="fw-bold mt-3 mb-0">Cukup</h6>
                        </div>
                        <div class="px-2 pb-2 pb-md-0 text-center">
                            <div id="buruk"></div>
                            <h6 class="fw-bold mt-3 mb-0">Buruk</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Rekap Penilaian Kinerja Vendor</div>
                {{-- <div class="card-tools">
                    <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal" data-target="#create-modal">
                        <span class="btn-label">
                            <i class="fa fa-plus"></i>
                        </span>
                        Create
                    </a>

                </div> --}}
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <form method="get" action="{{ url('penilaian/rekap/export') }}">
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
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="form-group form-group-default">
                                    <label for="">DPT / Non DPT</label>
                                    <div class="select2-input select2-warning mt-2">
                                        <select name="dpt_non_dpt" id="dpt_non_dpt" class="form-control" style="width: 100%">
                                            <option value="semua">semua</option>
                                            <option {{ $cat == 'DPT Jasa Konstruksi JTM, Gardu Distribusi dan JTR' ? 'selected' : '' }}>DPT Jasa Konstruksi JTM, Gardu Distribusi dan JTR</option>
                                            <option {{ $cat == 'DPT Jasa Konstruksi SR dan APP' ? 'selected' : '' }}>DPT Jasa Konstruksi SR dan APP</option>
                                            <option {{ $cat == 'DPT Jasa Grinding dan Polishing Crankshaft Mesin Diesel' ? 'selected' : '' }}>DPT Jasa Grinding dan Polishing Crankshaft Mesin Diesel</option>
                                            <option {{ $cat == 'DPT Jasa Rekondisi Sparepart Mesin Diesel' ? 'selected' : '' }}>DPT Jasa Rekondisi Sparepart Mesin Diesel</option>
                                            <option {{ $cat == 'Non DPT' ? 'selected' : '' }}>Non DPT</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group form-group-default">
                            <label for="">Rentang Tanggal</label>
                            <input type="text" readonly class="form-control">
                        </div> --}}

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Export</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3" style="padding-left: 0; padding-right: 0">
                <table id="basic-datatables" class="display table table-striped table-bordered table-hover" >
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Vendor</th>
                            <th>Deskrispi Pengadaan</th>
                            {{-- <th>No.Kontrak</th> --}}
                            {{-- <th>Nilai Kontrak</th> --}}
                            {{-- <th>Tgl.Kontrak</th> --}}
                            {{-- <th>Tgl.Selesai</th> --}}
                            <th>Tgl.Akhir</th>
                            <th>Total Nilai</th>
                            <th>Kategori Penilaian</th>
                            {{-- <th>DPT / Non DPT</th> --}}
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $no = 1;
                            $id = 0;
                            $selesai = 0;
                            $sudah_dinilai = 0;
                            $belum_dinilai = 0;
                        @endphp
                        @foreach ($rekap as $u)
                        @php
                        if ( strtotime(date('Y-m-d')) >= strtotime($u->tgl_akhir) || $u->tgl_selesai != NULL){
                            $selesai += 1;
                            if($u->pv_kategori != NULL){
                                $sudah_dinilai += 1;
                            }else{
                                $belum_dinilai += 1;
                            }
                        }
                        @endphp
                        <tr>
                            <td>{{ $no ++ }}</td>
                            <td style="font-size: 9pt;padding-left: 0;padding-right: 0;">{{ $u->nama }}</td>
                            <td style="font-size: 9pt;">
                                {!! ($u->pv_kategori != null) ? '<i class="fa icon-check text-success"></i>' : '<i class="fa icon-close text-danger"></i>' !!}
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
                            {{-- <td style="font-size: 9pt;">{{ $u->nomor_kontrak }}</td> --}}
                            {{-- <td>{{ number_format($u->nilai_kontrak) }}</td> --}}
                            {{-- <td>{{ $u->tgl_kontrak }}</td> --}}
                            {{-- <td>{{ $u->tgl_selesai }}</td> --}}
                            <td style="font-size: 9pt;">{{ $u->tgl_akhir }}</td>
                            <td style="font-size: 9pt;">{{ $u->total }}</td>
                            <td style="font-size: 9pt;" align="center">
                                {!! ($u->pv_kategori != null) ? $u->pv_kategori : '' !!}
                            </td>
                            {{-- <td>{{ $u->dpt_non_dpt }}</td> --}}
                        </tr>

                        @php
                            $id = $u->id;
                        @endphp

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
<script src="{{ asset('public/atlantis/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({
            pageLength:100,
            ordering: false,
        });
    });

    Circles.create({
			id:'selesai',
			radius:45,
			value:{{ $count_rekap['selesai'] }},
			maxValue:{{ $count_rekap['belum_selesai'] + $count_rekap['selesai'] }},
			width:7,
			text: {{ $count_rekap['selesai'] }},
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

    Circles.create({
			id:'sudah_dinilai',
			radius:45,
			value:{{ $count_rekap['sudah_dinilai'] }},
			maxValue:{{ $count_rekap['belum_selesai'] + $count_rekap['selesai'] }},
			width:7,
			text: {{ $count_rekap['sudah_dinilai'] }},
			colors:['#f1f1f1', '#47ABF7'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'belum_dinilai',
			radius:45,
			value:{{ $count_rekap['belum_dinilai'] }},
			maxValue:{{ $count_rekap['belum_selesai'] + $count_rekap['selesai'] }},
			width:7,
			text: {{ $count_rekap['belum_dinilai'] }},
			colors:['#f1f1f1', '#F15860'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'baik',
			radius:45,
			value:{{ $count_rekap['baik'] }},
			maxValue:{{ $count_rekap['sudah_dinilai'] + $count_rekap['belum_dinilai'] }},
			width:7,
			text: {{ $count_rekap['baik'] }},
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'cukup',
			radius:45,
			value:{{ $count_rekap['cukup'] }},
			maxValue:{{ $count_rekap['sudah_dinilai'] + $count_rekap['belum_dinilai'] }},
			width:7,
			text: {{ $count_rekap['cukup'] }},
			colors:['#f1f1f1', '#47ABF7'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'buruk',
			radius:45,
			value:{{ $count_rekap['buruk'] }},
			maxValue:{{ $count_rekap['sudah_dinilai'] + $count_rekap['belum_dinilai'] }},
			width:7,
			text: {{ $count_rekap['buruk'] }},
			colors:['#f1f1f1', '#F15860'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

    $('#unit_id').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });
    $('#mitra_id').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });
    $('#dpt_non_dpt').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });

    $(document).on('change','#unit_id', function(){
        var unit_id = $(this).val()
        var mitra_id = $('#mitra_id').val()
        var cat = $('#dpt_non_dpt').val()
        window.location = "{!! url('penilaian/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+'&cat='+cat
        // console.log(mitra_id)
    })

    $(document).on('change','#mitra_id', function(){
        var mitra_id = $(this).val()
        var unit_id = $('#unit_id').val()
        var cat = $('#dpt_non_dpt').val()
        window.location = "{!! url('penilaian/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+'&cat='+cat
        // console.log(mitra_id)
    })
    
    $(document).on('change','#dpt_non_dpt', function(){
        var cat = $(this).val()
        var mitra_id = $('#mitra_id').val()
        var unit_id = $('#unit_id').val()
        window.location = "{!! url('penilaian/rekap?unit_id=') !!}"+unit_id+'&mitra_id='+mitra_id+'&cat='+cat
        // console.log(mitra_id)
    })

</script>
    
@endsection