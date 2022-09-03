<div class="modal fade" id="create-pelaksanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_pelaksanaan">
                @csrf
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
                                <input type="text" class="form-control" name="nomor_kontrak">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Kontrak</label>
                                <input type="text" class="form-control datepicker" name="tgl_kontrak">
                            </div>
                        </div>
                    </div>


                    <div class="form-group form-group-default">
                        <label for="exampleFormControlInput1">Penyedia Barang Jasa</label>
                        <select class="form-control" name="mitra_id" required>
                            @foreach($mitra as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Efektif</label>
                                <input type="text" class="form-control datepicker" name="tgl_efektif">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Akhir</label>
                                <input type="text" class="form-control datepicker" name="tgl_akhir">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nilai Kontrak</label>
                                <div class="input-group">
                                    <input type="number" id="nilai_kontrak" autocomplete="off" name="nilai_kontrak"
                                        class="form-control" aria-label="Amount (to the nearest dollar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text f_nilai_kontrak"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default">
                        <label>Tanggal Pelaksanaan IDD</label>
                        <input type="text" class="form-control datepicker" name="tgl_idd">
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
                            <option>Dokumen Kuesioner IDD</option>
                            <option>Dokumen Penilaian IDD</option>
                            <option>Dokumen Pendukung IDD</option>
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

{{-- detail --}}
@if($pengadaan->pelaksanaan == null && ( (($pengadaan->metode_pengadaan == 'Pengadaan Langsung' || $pengadaan->metode_pengadaan == 'Kontrak Rinci') && $pengadaan->submit == 1) 
|| ($pengadaan->perencanaa != null && $pengadaan->perencanaan->submit == 1)) )
    <a href="#" data-toggle="modal" data-target="#create-pelaksanaan" class="btn btn-success btn-round btn-sm">
        <span class="btn-label">
            <i class="fa fa-pencil"></i>
        </span>
        Create Data Pelaksana Pengadaan
    </a>
@elseif($pengadaan->pelaksanaan == null && $pengadaan->state == 2)
    <a href="#" data-toggle="modal" data-target="#create-pelaksanaan" class="btn btn-success btn-round btn-sm">
        <span class="btn-label">
            <i class="fa fa-pencil"></i>
        </span>
        Create Data Pelaksana Pengadaan
    </a>
@endif

@if($pengadaan->pelaksanaan != null)
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
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_akhir }}" readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Nilai Kontrak</label>
                <input type="text" class="form-control"
                    value="{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}" readonly />
            </div>
        </div>
        
    </div>

    <div class="form-group form-group-default">
        <label>Tgl. IDD</label>
        <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_idd }}" readonly />
    </div>

    <div class="form-group form-group-default">
        <label for="">FILE UPLOAD</label>
        @foreach($pengadaan->pelaksanaan->pelaksanaanFile as $file)
            <a href="{{ asset($file->file) }}" class="text-primary">{!! $file->kategori . ' (' . $file->file . ')'
                !!}</a><br>
        @endforeach
        <br>
        <a href="#" data-toggle="modal" data-target="#create-pelaksanaan-file-modal"><span class="badge badge-success">Upload File</span></a>
    </div>
@endif

@if($pengadaan->state == 2 && $pengadaan->pelaksanaan != null)
    <a href="#" class="btn btn-success btn-round btn-sm btn-submit-pelaksanaan">
        <span class="btn-label">
            <i class="fa fa-check"></i>
        </span>
        Submit Data Pelaksana Pengadaan
    </a>
@endif
