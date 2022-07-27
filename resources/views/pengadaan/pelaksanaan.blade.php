<div class="modal fade" id="create-pelaksanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_pelaksanaan">
                @csrf
                <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pelaksanaan</h5>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="update-pelaksanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_pelaksanaan_update">
                @csrf
                <input type="hidden" name="id" id="e_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Pelaksanaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                        <input type="text" class="form-control" name="no_nota_dinas" id="e_no_nota_dinas" disabled>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Nota Dinas</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_nota_dinas"
                                id="e_tgl_nota_dinas" disabled>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Kontrak</label>
                        <input type="text" class="form-control" name="nomor_kontrak" id="e_nomor_kontrak">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kontrak</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_kontrak" id="e_tgl_kontrak">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Penyedia Barang Jasa</label>
                        <input type="text" class="form-control" name="penyedia_barang_jasa"
                            id="e_penyedia_barang_jasa">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Efektif</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_efektif"
                                id="e_tgl_efektif">
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
                            <input type="text" class="form-control datepicker" name="tanggal_akhir"
                                id="e_tanggal_akhir">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai Kontrak</label>
                        <input type="text" class="form-control" name="nilai_kontrak" id="e_nilai_kontrak">
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
            data-target="#create-pelaksanaan">
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
                <label>Nama</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->no_nota_dinas }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Kategori Kebutuhan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_nota_dinas }}"
                    readonly />
            </div>
        </div>
    </div>

    <td align="center">
        <a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update"
            data-id="{{ $pengadaan->pelaksanaan->id }}"
            data-no_nota_dinas="{{ $pengadaan->pelaksanaan->no_nota_dinas }}"
            data-tgl_nota_dinas="{{ $pengadaan->pelaksanaan->tgl_nota_dinas }}">
            <i class="fa fa-edit"></i> Create
        </a>
@endif
