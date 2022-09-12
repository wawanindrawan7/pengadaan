<div class="modal fade" id="create-pengadaan-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="pengadaan_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Pengadaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File KKP</label>
                        <input type="file" class="form-control" name="file_kkp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File TOR/KK</label>
                        <input type="file" class="form-control" name="file_tor_kk">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Referensi</label>
                        <input type="file" class="form-control" name="file_referensi">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File RAB/PA</label>
                        <input type="file" class="form-control" name="file_rab_pa">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Justifikasi</label>
                        <input type="file" class="form-control" name="file_justifikasi">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Nota Dinas GM ke Rendan</label>
                        <input type="file" class="form-control" name="file_nota_dinas">
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

<div class="modal fade" id="update-pengadaan-modal" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_update_pengadaan" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="e_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Pengadaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group form-group-default">
                        <label for="exampleFormControlInput1">Nama Pengadaan</label>
                        <textarea class="form-control" name="nama" id="e_nama" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Lokasi</label>
                                <select name="lokasi" id="e_lokasi" class="form-control">
                                    <option value=""></option>
                                    @foreach ($unit as $un)
                                        <option>{{ $un->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Sumber Anggaran</label>
                                <select name="sumber_anggaran" id="e_sumber_anggaran" class="form-control">
                                    <option>Operasi</option>
                                    <option>Investasi</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nilai Anggaran (RAB)</label>
                                <div class="input-group">
                                    <input type="number" id="e_nilai_anggaran" autocomplete="off"
                                        name="nilai_anggaran" class="form-control"
                                        aria-label="Amount (to the nearest dollar)">
                                    <div class="input-group-append">
                                        <span class="input-group-text f_nilai_anggaran"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Jenis</label>
                                <select name="jenis" id="e_jenis" class="form-control">
                                    <option>Barang</option>
                                    <option>Jasa</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Volume</label>
                                <input type="text" id="e_volume" class="form-control" name="volume" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Metode Pengadaan</label>
                                <select name="metode_pengadaan" id="e_metode_pengadaan" class="form-control">
                                    <option>Pengadaan Langsung</option>
                                    <option>Penunjukan Langsung</option>
                                    <option>Tender Terbatas</option>
                                    <option>Tender Terbuka</option>
                                    <option>Kontrak Rinci</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                                <input type="text" class="form-control" id="e_no_nota_dinas" name="no_nota_dinas"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Nota Dinas</label>
                                <input type="text" class="form-control date" name="tgl_nota_dinas"
                                    id="e_tgl_nota_dinas" required>
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



{{-- detail --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Nama</label>
            <input disabled type="text" class="form-control" value="{{ $pengadaan->nama }}" />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Lokasi</label>
            <input type="text" class="form-control" value="{{ $pengadaan->lokasi }}" disabled />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Sumber Anggaran</label>
            <input type="text" class="form-control" value="{{ $pengadaan->sumber_anggaran }}" disabled />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Nilai Anggaran (RAB)</label>
            <input type="text" class="form-control" value="{{ number_format($pengadaan->nilai_anggaran) }}"
                disabled />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Jenis</label>
            <input type="text" class="form-control" value="{{ $pengadaan->jenis }}" disabled />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Volume</label>
            <input type="text" class="form-control" value="{{ $pengadaan->volume }}" disabled />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Metode Pengadaan</label>
            <input type="text" class="form-control" value="{{ $pengadaan->metode_pengadaan }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Nomor Nota Dinas</label>
            <input type="text" class="form-control" value="{{ $pengadaan->no_nota_dinas }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Tanggal Nota Dinas</label>
            <input type="text" class="form-control"
                value="{{ date('d-m-Y', strtotime($pengadaan->tgl_nota_dinas)) }}" disabled />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Direksi Pekerjaan</label>
            <input type="text" class="form-control" value="{{ $pengadaan->direksiPk->users->name }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Pengawas Pekerjaan</label>
            <input type="text" class="form-control" value="{{ $pengadaan->pengawasPk->users->name }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Pengawas K3</label>
            <input type="text" class="form-control" value="{{ $pengadaan->pengawasK3->users->name }}" disabled />
        </div>
    </div>
</div>

<div class="form-group form-group-default">
    <label>Komite Value For Money</label>
    <p class="mt-2">
        @php
            $no = 1;
        @endphp
        @foreach ($pengadaan->usersReviewer as $item)
            {!! $no++ . '. ' . $item->users->name . '<br>' !!}
        @endforeach
    </p>
</div>


<div class="form-group form-group-default">
    <label for="">File Upload</label>
    @if ($pengadaan->pengadaanFile != null)
        @if ($pengadaan->pengadaanFile->file_kkp != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_kkp) }}" class="text-primary">File KKP</a><br>
        @endif
        @if ($pengadaan->pengadaanFile->file_tor_kk != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_tor_kk) }}" class="text-primary">File TOR/KK</a><br>
        @endif
        @if ($pengadaan->pengadaanFile->file_referensi != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_referensi) }}" class="text-primary">File
                Referensi</a><br>
        @endif
        @if ($pengadaan->pengadaanFile->file_rab_pa != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_rab_pa) }}" class="text-primary">File RAB/PA</a><br>
        @endif
        @if ($pengadaan->pengadaanFile->file_justifikasi != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_justifikasi) }}" class="text-primary">File
                Justifikasi</a><br>
        @endif
        @if ($pengadaan->pengadaanFile->file_nota_dinas != null)
            <a href="{{ asset($pengadaan->pengadaanFile->file_nota_dinas) }}" class="text-primary">FFile Nota Dinas
                GM ke Rendan</a><br>
        @endif
    @endif
    <a href="#" data-toggle="modal" data-target="#create-pengadaan-file-modal"><span
            class="badge badge-success">Upload File</span></a>
</div>

<a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update"
    data-id="{{ $pengadaan->id }}" data-nama="{{ $pengadaan->nama }}" data-lokasi="{{ $pengadaan->lokasi }}"
    data-sumber_anggaran="{{ $pengadaan->sumber_anggaran }}" data-nilai_anggaran="{{ $pengadaan->nilai_anggaran }}"
    data-jenis="{{ $pengadaan->jenis }}" data-volume="{{ $pengadaan->volume }}"
    data-metode_pengadaan="{{ $pengadaan->metode_pengadaan }}" data-no_nota_dinas="{{ $pengadaan->no_nota_dinas }}"
    data-tgl_nota_dinas="{{ $pengadaan->tgl_nota_dinas }}">
    <i class="fa fa-edit"></i> <span>Edit Pengadaan</span>
</a>

@if ($pengadaan->submit == 0)
    <a href="#" class="btn btn-success btn-round btn-submit">
        <span class="btn-label">
            <i class="fa fa-check"></i>
        </span>
        Submit
    </a>
@endif
