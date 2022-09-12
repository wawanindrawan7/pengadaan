@extends('layouts.master')
@section('content')
<div class="col-md-12">
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

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Export</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table id="basic-datatables" class="display table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="10%">Nama Vendor</th>
                            <th width="10%">Deskrispi Pengadaan</th>
                            <th width="5%">No.Kontrak</th>
                            <th width="5%">Nilai Kontrak</th>
                            <th width="5%">Tgl.Kontrak</th>
                            <th width="5%">Tgl.Selesai</th>
                            <th width="5%">Total Nilai</th>
                            <th width="5%">Kategori Penilaian</th>
                            <th width="5%">DPT / Non DPT</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @php
                            $no = 1;
                            $id = 0;
                        @endphp
                        @foreach ($rekap as $u)
                        <tr>
                            <td>{{ ($u->id != $id) ? $no ++ : '' }}</td>
                            <td>{{ ($u->id != $id) ? $u->nama : '' }}</td>
                            <td>{{ $u->peng_nama }}</td>
                            <td>{{ $u->nomor_kontrak }}</td>
                            <td>{{ number_format($u->nilai_kontrak) }}</td>
                            <td>{{ $u->tgl_kontrak }}</td>
                            <td>{{ $u->tgl_selesai }}</td>
                            <td>{{ $u->total }}</td>
                            <td>{{ $u->pv_kategori }}</td>
                            <td>{{ $u->dpt_non_dpt }}</td>
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
    $('#dpt_non_dpt').select2({
        theme: "bootstrap",
        placeholder:"Pilih Vendor"
    });

    $(document).on('change','#mitra_id', function(){
        var mitra_id = $(this).val()
        var cat = $('#dpt_non_dpt').val()
        window.location = "{!! url('penilaian/rekap?mitra_id=') !!}"+mitra_id+'&cat='+cat
        console.log(mitra_id)
    })
    
    $(document).on('change','#dpt_non_dpt', function(){
        var cat = $(this).val()
        var mitra_id = $('#mitra_id').val()
        window.location = "{!! url('penilaian/rekap?mitra_id=') !!}"+mitra_id+'&cat='+cat
        console.log(mitra_id)
    })

</script>
    
@endsection