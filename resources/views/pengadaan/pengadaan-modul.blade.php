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
                        <label for="exampleFormControlInput1">File RKS</label>
                        <input type="file" class="form-control" name="file_rks">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File HPE</label>
                        <input type="file" class="form-control" name="file_hpe">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Pakta Integritas</label>
                        <input type="file" class="form-control" name="file_pakta_integritas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File DRP</label>
                        <input type="file" class="form-control" name="file_drp">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">File Nota Dinas GM ke Laksda</label>
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

{{-- detail --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Nama</label>
            <input disabled type="text" class="form-control" value="{{ $pengadaan->nama }}"
                 />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Lokasi</label>
            <input type="text" class="form-control" value="{{ $pengadaan->unit->nama }}"
                disabled />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Sumber Anggaran</label>
            <input type="text" class="form-control" value="{{ $pengadaan->sumber_anggaran }}"
                disabled />
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
            <input type="text" class="form-control" value="{{ $pengadaan->jenis }}"
                disabled />
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group form-group-default">
            <label>Volume</label>
            <input type="text" class="form-control" value="{{ $pengadaan->volume }}"
                disabled />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Metode Pengadaan</label>
            <input type="text" class="form-control"
                value="{{ $pengadaan->metode_pengadaan }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Nomor Nota Dinas</label>
            <input type="text" class="form-control"
                value="{{ $pengadaan->no_nota_dinas }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Tanggal Nota Dinas</label>
            <input type="text" class="form-control" value="{{ date('d-m-Y', strtotime($pengadaan->tgl_nota_dinas)) }}"  disabled/>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Direksi Pekerjaan</label>
            <input type="text" class="form-control"
                value="{{ $pengadaan->direksiPk->users->name }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Pengawas Pekerjaan</label>
            <input type="text" class="form-control"
                value="{{ $pengadaan->pengawasPk->users->name }}" disabled />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group form-group-default">
            <label>Pengawas K3</label>
            <input type="text" class="form-control"
                value="{{ $pengadaan->pengawasK3->users->name }}" disabled />
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
            {!! ($no ++) .'. '.$item->users->name."<br>" !!}
        @endforeach
    </p>
</div>


<div class="form-group form-group-default">
    <label for="">File Upload</label>
    @if ($pengadaan->pengadaanFile != null)
    @if ($pengadaan->pengadaanFile->file_rks != null)
    <a href="{{ asset($pengadaan->pengadaanFile->file_rks) }}" class="text-primary">File RKS</a><br>
    @endif
    @if ($pengadaan->pengadaanFile->file_hpe != null)
    <a href="{{ asset($pengadaan->pengadaanFile->file_hpe) }}" class="text-primary">File HPE</a><br>
    @endif
    @if ($pengadaan->pengadaanFile->file_pakta_integritas != null)
    <a href="{{ asset($pengadaan->pengadaanFile->file_pakta_integritas) }}" class="text-primary">File Fakta Integritas</a><br>
    @endif
    @if ($pengadaan->pengadaanFile->file_drp != null)
    <a href="{{ asset($pengadaan->pengadaanFile->file_drp) }}" class="text-primary">File DRP</a><br>
    @endif
    @if ($pengadaan->pengadaanFile->file_nota_dinas != null)
    <a href="{{ asset($pengadaan->pengadaanFile->file_nota_dinas) }}" class="text-primary">File Nota Dinas GM ke Laksda</a><br>
    @endif
    @endif
    <a href="#" data-toggle="modal" data-target="#create-pengadaan-file-modal"><span class="badge badge-success">Upload File</span></a>
</div>

@if($pengadaan->submit == 0)
    <a href="#" class="btn btn-success btn-round btn-submit">
        <span class="btn-label">
            <i class="fa fa-check"></i>
        </span>
        Submit
    </a>
@endif
