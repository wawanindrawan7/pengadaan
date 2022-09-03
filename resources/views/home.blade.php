@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-info">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Inisasi</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($inisiasi) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-warning">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Perencana Pengadaan</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($perencana) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-danger">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-cogs"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Pelaksana Pengadaan</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($pelaksana) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-success">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-cogs"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Manajemen Kontrak</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($kontrak) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                <div class="table-responsive">
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
                            @foreach ($penilaian as $u)
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
</div>
@endsection
