
<div class="modal fade" id="update-pelaksanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_pelaksanaan">
                @csrf
                <input type="hidden" name="id" id="e_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Create Pelaksanaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="pengadaan_id" value="{{ $pengadaan->id }}">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nomor Kontrak</label>
                                <input type="text" class="form-control" name="nomor_kontrak" id="e_nomor_kontrak">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Kontrak</label>
                                <input type="text" class="form-control datepicker" name="tgl_kontrak"
                                    id="e_tgl_kontrak">
                            </div>
                        </div>
                    </div>


                    <div class="form-group form-group-default">
                        <label for="exampleFormControlInput1">Penyedia Barang Jasa</label>
                        <select class="form-control" name="mitra_id" id="mitra_id" required>

                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Efektif</label>
                                <input type="text" class="form-control datepicker" name="tgl_efektif"
                                    id="e_tgl_efektif">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Akhir</label>
                                <input type="text" class="form-control datepicker" name="tgl_akhir"
                                    id="e_tanggal_akhir">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6    ">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nilai Kontrak</label>
                                <div class="input-group">
                                    <input type="number" id="nilai_kontrak" autocomplete="off" name="nilai_kontrak" class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text f_nilai_kontrak"></span>
                                    </div>
                                </div>
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

<div class="modal fade" id="create-pelaksanaan-file-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="pelaksanaan_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="pelaksanaan_id" value="{{ ($pengadaan->pelaksanaan != null) ? $pengadaan->pelaksanaan->id : "" }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Pelaksanaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option value=""></option>
                            <option>Jadwal Pengadaan</option>
                            <option>HPS</option>
                            <option>Kontrak</option>
                            <option>Jaminan Pelaksanaan</option>
                        </select>
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


@if ($pengadaan->pelaksanaan == null)
    <div class="card-tools">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#update-pelaksanaan">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Create
        </a>
    </div>
@else


    <div class="row">
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Nomor Kontak</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->nomor_kontrak }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Tgl. Kontrak</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_kontrak }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Penyedia Barang / Jasa</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->mitra->nama }}"
                    readonly />
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Tgl. Efektif</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_efektif }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Tgl. Akhir</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_akhir }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Nilai Kontrak</label>
                <input type="text" class="form-control" value="{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}"
                    readonly />
            </div>
        </div>
    </div>




@endif

@if ($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->pelaksanaanFile != null)
    <div class="table-responsive">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2 mt-2" data-toggle="modal"
            data-target="#create-pelaksanaan-file-modal">
            <span class="btn-label">
                <i class="fa fa-upload"></i>
            </span>
            Upload Files Pelaksanaan
        </a>
        <table class="table table-bordered table-bordered-bd-info mt-2">
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengadaan->pelaksanaan->pelaksanaanFile as $u)
                    <tr>
                        {{-- <td width="1%">{{ $no++ }}</td> --}}
                        <td width="30%">
                            <a href="{{ url($u->file) }}">{{ $u->kategori }}
                            </a>
                        </td>
                        <td align="center" width="1%">
                            <a title="Delete" href="#" class="btn btn-danger btn-round btn-xs mr-2 btn-delete-pelaksanaan"
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
