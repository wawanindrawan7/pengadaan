<div class="modal fade" id="create-perencanaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_perencanaan">
                @csrf
                <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Perencanaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">User</label>
                        <select name="user" class="form-control">
                            <option>Transmisi & Distribusi</option>
                            <option>Pembangkit</option>
                            <option>Perencanaan</option>
                            <option>KKU</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori Kebutuhan</label>
                        <select name="kategori_kebutuhan" class="form-control">
                            <option>Rutin</option>
                            <option>Leverage</option>
                            <option>Critical</option>
                            <option>Strategis</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Kategori Kebutuhan</label>
                        <input type="text" class="form-control" name="kategori_kebutuhan" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Penggunaan</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_penggunaan">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Waktu Pelaksanaan</label>
                        <input type="text" class="form-control" name="waktu_pelaksanaan" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Strategi Pengadaan</label>
                        <select name="strategi_pengadaan" class="form-control">
                            <option>Sentralisasi unit induk</option>
                            <option>Dilaksanakan unit pelaksana</option>
                            <option>JPROC</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Jenis Kontrak</label>
                        <select name="jenis_kontrak" class="form-control">
                            <option>Lumsum</option>
                            <option>Harga satuan</option>
                            <option>Gabungan lumsum & harga satuan</option>
                            <option>KHS</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal HPE</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_penggunaan">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-calendar-check"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nilai HPE</label>
                        <input type="number" class="form-control" name="nilai_hpe" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor RKS</label>
                        <input type="text" class="form-control" name="nomor_rks" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal RKS</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tanggal_rks">
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

<div class="modal fade" id="create-perencanaan-file-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="perencanaan_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="perencanaan_id" value="{{ ($pengadaan->perencanaan != null) ? $pengadaan->perencanaan->id : "" }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Perencanaan</h5>
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

@if ($pengadaan->perencanaan == null)
    <div class="card-tools">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#create-perencanaan">
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
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->user }}" readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Kategori Kebutuhan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->kategori_kebutuhan }}"
                    readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal Penggunaan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->tgl_penggunaan }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Waktu Pelaksanaan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->waktu_pelaksanaan }}"
                    readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Strategi Pengadaan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->kategori_kebutuhan }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Jenis Kontrak</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->jenis_kontrak }}"
                    readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal HPE</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->tgl_hpe }}" readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nilai HPE</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->nilai_hpe }}"
                    readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nomor RKS</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->nomor_rks }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal RKS</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->tanggal_rks }}"
                    readonly />
            </div>
        </div>
    </div>
@endif

@if ($pengadaan->perencanaan != null && $pengadaan->perencanaan->perencanaanFile != null)
    <div class="table-responsive">
        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#create-perencanaan-file-modal">
            <span class="btn-label">
                <i class="fa fa-upload"></i>
            </span>
            Upload Files Perencanaan
        </a>
        <table id="basic-datatables" class="display table table-bordered table-hover mt-2">
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($pengadaan->perencanaan->perencanaanFile as $u)
                    <tr>
                        <td width="1%">{{ $no++ }}</td>
                        <td width="30%">
                            <a href="{{ url($u->file) }}">{{ $u->kategori }}
                            </a>
                        </td>
                        <td align="center" width="1%">


                            <a title="Delete" href="#" class="btn btn-danger btn-round btn-xs mr-2 btn-delete"
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
