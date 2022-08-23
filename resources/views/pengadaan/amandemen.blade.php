<div class="modal fade" id="create-amandemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_amandemen">
                @csrf
                <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Amandemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                        <input type="text" class="form-control" name="no_nota_dinas" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Nota Dinas</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_nota_dinas">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Amandemen</label>
                        <input type="text" class="form-control" name="nomor_amandemen" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Amandemen</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_amandemen">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_akhir">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
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


<div class="modal fade" id="update-amandemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_amandemen_update">
                @csrf
                <input type="hidden" name="id" id="e_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Amandemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_selesai_pekerjaan"
                                id="e_tgl_selesai_pekerjaan">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit_update" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<div class="modal fade" id="create-amandemen-file-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="amandemen_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="amandemen_id"
                    value="{{ $pengadaan->amandemen != null ? $pengadaan->amandemen->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Amandemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori</label>
                        <input type="text" class="form-control" name="kategori" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">File</label>
                        <input type="file" class="form-control" name="file[]" multiple="multiple" required>
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


@if ($pengadaan->amandemen == null)
    <div class="card-tools">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#create-amandemen">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Create
        </a>
    </div>
@else
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nomor Nota Dinas</label>
                <input type="text" class="form-control" value="{{ $pengadaan->amandemen->no_nota_dinas }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal Nota Dinas</label>
                <input type="text" class="form-control" value="{{ $pengadaan->amandemen->tgl_nota_dinas }}"
                    readonly />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nomor Amandemen</label>
                <input type="text" class="form-control" value="{{ $pengadaan->amandemen->nomor_amandemen }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal Amandemen</label>
                <input type="text" class="form-control" value="{{ $pengadaan->amandemen->tgl_amandemen }}"
                    readonly />
            </div>
        </div>
    </div>

    <div class="form-group form-group-default">
        <label>Tanggal Akhir</label>
        <input type="text" class="form-control" value="{{ $pengadaan->amandemen->tgl_akhir }}" readonly />
    </div>

    <a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update-amandemen"
        data-id="{{ $pengadaan->amandemen->id }}">
        <i class="fa fa-edit"></i> Update
    </a>
@endif



@if ($pengadaan->amandemen != null && $pengadaan->amandemen->amandemenFile != null)
    <div class="table-responsive">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 mt-2" data-toggle="modal"
            data-target="#create-amandemen-file-modal">
            <span class="btn-label">
                <i class="fa fa-upload"></i>
            </span>
            Upload Files Amandemen
        </a>
        <table id="basic-datatables" class="display table table-bordered table-hover mt-2">
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengadaan->amandemen->amandemenFile as $u)
                    <tr>
                        <td width="1%">{{ $no++ }}</td>
                        <td width="30%">
                            <a href="{{ url($u->file) }}">{{ $u->kategori }}
                            </a>
                        </td>
                        <td align="center" width="1%">
                            <a title="Delete" href="#"
                                class="btn btn-danger btn-round btn-xs mr-2 btn-delete-amandemen"
                                data-id="{{ $u->id }}">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endif

<div class="form-group form-group-default bg-info text-white mt-3">
    <label for=""><b class="text-white">PENILAIAN KINERJA VENDOR</b></label>
</div>

@if ($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor == null)
<div class="row">
    <div class="col-md-3">
        <a href="{{ url('penilaian/form-errect?id=' . $pengadaan->id) }}"
            class="btn btn-primary btn-round form-control">Form Errect</a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('penilaian/form-supply-only?id=' . $pengadaan->id) }}"
            class="btn btn-primary btn-round form-control">Form Supply Only</a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('penilaian/form-supply-errect?id=' . $pengadaan->id) }}"
            class="btn btn-primary btn-round form-control">Form Supply Errect</a>
    </div>
    <div class="col-md-3">
        <a href="{{ url('penilaian/form-khs_distribusi_niaga?id=' . $pengadaan->id) }}"
            class="btn btn-primary btn-round form-control">Form KHS Distribusi & Niaga</a>
    </div>
</div>
@endif


@if ($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor != null)
    @if ($pengadaan->pelaksanaan->penilaianVendor->form == 'Errect' ||
        $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Only' ||
        $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Errect')
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form Penilaian Vendor ({{$pengadaan->pelaksanaan->penilaianVendor->form}})</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th width="60%">Kriteria Penilaian</th>
                                        <th width="10%">Bobot</th>
                                        <th width="10%">Nilai</th>
                                        <th width="9%">Nilai X Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengadaan->pelaksanaan->penilaianVendor->formPenilaian as $u)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $u->kriteria }}</td>
                                            <td>{{ $u->bobot . '%' }} </td>
                                            <td>{{ $u->nilai }}</td>
                                            <td>{{ $u->nilai_bobot }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td>{{$pengadaan->pelaksanaan->penilaianVendor->total}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td>{{$pengadaan->pelaksanaan->penilaianVendor->kategori}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-title">Form Penilaian Vendor ({{$pengadaan->pelaksanaan->penilaianVendor->form}})</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="1%">No.</th>
                                        <th width="60%">Kriteria Penilaian</th>
                                        <th width="10%">Bobot</th>
                                        <th width="10%">Nilai</th>
                                        <th width="9%">Nilai X Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($pengadaan->pelaksanaan->penilaianVendor->formKhs as $khs)
                                        <tr>
                                            <td>{{ $no++}}</td>
                                            <td colspan="4"><b>{{ $khs->nama }}</b></td>
                                        </tr>
                                        @foreach ($khs->formKhsDetail as $khsDetail)
                                        <tr>
                                            <td></td>
                                            <td><i>{{ $khsDetail->kriteria }}</</td>
                                            <td>{{ $khsDetail->bobot }} </td>
                                            <td>{{ $khsDetail->nilai }}</td>
                                            <td>{{ $khsDetail->nilai_bobot }}</td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td>{{$pengadaan->pelaksanaan->penilaianVendor->total}}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td>{{$pengadaan->pelaksanaan->penilaianVendor->kategori}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
@endif
