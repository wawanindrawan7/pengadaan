<div class="modal fade" id="create-pelaksanaan" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="select2-input select2-warning mt-2">
                            <select class="form-control" id="mitra_id" name="mitra_id" style="width: 100%" required>
                                @foreach ($mitra as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <a href="#">Tambah Data Vendor</a>
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

                <input type="hidden" name="pelaksanaan_id"
                    value="{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Pelaksanaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Jadwal</label>
                        <input type="file" class="form-control" name="file_jadwal">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File HPS</label>
                        <input type="file" class="form-control" name="file_hps">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Kontrak</label>
                        <input type="file" class="form-control" name="file_kontrak">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Jaminan Pelaksana</label>
                        <input type="file" class="form-control" name="file_jaminan_pelaksana">
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

<div class="modal fade" id="create-idd-file-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="idd_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="pelaksanaan_id"
                    value="{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File IDD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Kuisioner IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_kusioner">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Penilaian IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_penilaian">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Pendukung IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_pendukung">
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

<div class="modal fade" id="create-idd-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_idd" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="pelaksanaan_id"
                    value="{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create IDD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <label>Tanggal Pelaksanaan IDD</label>
                        <input type="text" class="form-control datepicker" name="tgl_idd">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Kuisioner IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_kusioner">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Penilaian IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_penilaian">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Dokumen Pendukung IDD</label>
                        <input type="file" class="form-control" name="file_dokumen_pendukung">
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
@if ($pengadaan->pelaksanaan == null &&
    ((($pengadaan->metode_pengadaan == 'Pengadaan Langsung' || $pengadaan->metode_pengadaan == 'Kontrak Rinci') &&
        $pengadaan->submit == 1) ||
        ($pengadaan->perencanaa != null && $pengadaan->perencanaan->submit == 1)))
    <a href="#" data-toggle="modal" data-target="#create-pelaksanaan"
        class="btn btn-success btn-round btn-sm">
        <span class="btn-label">
            <i class="fa fa-pencil"></i>
        </span>
        Create Data Pelaksana Pengadaan
    </a>
@elseif($pengadaan->pelaksanaan == null && $pengadaan->state == 2 && Auth::user()->kategori == 'Pelaksana')
    <a href="#" data-toggle="modal" data-target="#create-pelaksanaan"
        class="btn btn-success btn-round btn-sm">
        <span class="btn-label">
            <i class="fa fa-pencil"></i>
        </span>
        Create Data Pelaksana Pengadaan
    </a>
@endif

@if ($pengadaan->pelaksanaan != null)
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
                <input type="text" class="form-control"
                    value="{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}" readonly />
            </div>
        </div>

    </div>



    <div class="form-group form-group-default">
        <label for="">File Upload</label>
        @if ($pengadaan->pelaksanaan->pelaksanaanFile != null)
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_jadwal != null)
                <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_jadwal) }}"
                    class="text-primary">File Jadwal</a><br>
            @endif
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_hps != null)
                <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_hps) }}" class="text-primary">File
                    HPS</a><br>
            @endif
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_kontrak != null)
                <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_kontrak) }}"
                    class="text-primary">File Kontrak</a><br>
            @endif
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_jaminan_pelaksana != null)
                <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_jaminan_pelaksana) }}"
                    class="text-primary">File Jaminan Pelaksanaan</a><br>
            @endif
        @endif
        <br>
        <a href="#" data-toggle="modal" data-target="#create-pelaksanaan-file-modal"><span
                class="badge badge-info">Upload File</span></a>
    </div>


    <div class="form-group form-group-default bg-warning text-white">
        <label for=""><b class="text-white">Pelaksanaan IDD</b></label>
    </div>

    @if ($pengadaan->pelaksanaan->tgl_idd != null)
        <div class="form-group form-group-default">
            <label>Tgl. Pelaksanaan IDD</label>
            <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_idd }}" readonly />
        </div>

        <div class="form-group form-group-default">
            <label for="">File Upload</label>
            @if ($pengadaan->pelaksanaan->pelaksanaanFile != null)
                @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_kusioner != null)
                    <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_kusioner) }}"
                        class="text-primary">File Dokumen Kusioner IDD</a><br>
                @endif
                @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_penilaian != null)
                    <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_penilaian) }}"
                        class="text-primary">File Dokumen Penilaian IDD</a><br>
                @endif
                @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_pendukung != null)
                    <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_dokumen_pendukung) }}"
                        class="text-primary">File Dokumen Pendukung IDD</a><br>
                @endif
            @endif
            <br>
            <a href="#" data-toggle="modal" data-target="#create-idd-file-modal"><span
                    class="badge badge-info">Upload File IDD</span></a>
        </div>
    @endif

    @if ($pengadaan->pelaksanaan->tgl_idd == null)
        <a href="#" class="btn btn-warning btn-round btn-sm" data-toggle="modal"
            data-target="#create-idd-modal">
            <span class="btn-label">
                <i class="fa fa-check"></i>
            </span>
            Input IDD
        </a>
    @endif

@endif

@if ($pengadaan->state == 2 && $pengadaan->pelaksanaan != null && Auth::user()->kategori == 'Pelaksana')
    <a href="#" class="btn btn-success btn-round btn-sm btn-submit-pelaksanaan">
        <span class="btn-label">
            <i class="fa fa-check"></i>
        </span>
        Submit Data Pelaksana Pengadaan
    </a>
@endif
