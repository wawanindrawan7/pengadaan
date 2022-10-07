<div class="modal fade" id="create-perencanaan-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="perencanaan_file" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="perencanaan_id"
                    value="{{ $pengadaan->perencanaan != null ? $pengadaan->perencanaan->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload File Perencanaan</h5>
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
{{-- Detail --}}

<div class="modal fade" id="update-perencanaan-modal" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_update_perencanaan" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="pp_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Perencanaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Kategori Kebutuhan</label>
                                <select name="kategori_kebutuhan" id="e_kategori_kebutuhan" class="form-control"
                                    required>
                                    <option>Rutin</option>
                                    <option>Leverage</option>
                                    <option>Critical</option>
                                    <option>Strategis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Tanggal Penggunaan</label>
                                <input type="text" class="form-control date" name="tgl_penggunaan"
                                    id="e_tgl_penggunaan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Waktu Pelaksanaan</label>
                                <input type="text" class="form-control" name="waktu_pelaksanaan"
                                    id="e_waktu_pelaksanaan" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Strategi Pengadaan</label>
                                <select name="strategi_pengadaan" id="e_strategi_pengadaan" class="form-control"
                                    required>
                                    <option>Sentralisasi unit induk</option>
                                    <option>Dilaksanakan unit pelaksana</option>
                                    <option>JPROC</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Jenis Kontrak</label>
                                <select name="jenis_kontrak" id="e_jenis_kontrak" class="form-control" required>
                                    <option>Lumsum</option>
                                    <option>Harga satuan</option>
                                    <option>Gabungan lumsum & harga satuan</option>
                                    <option>KHS</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nilai HPE</label>
                                <div class="input-group">
                                    <input type="number" id="e_nilai_hpe" autocomplete="off" name="nilai_hpe"
                                        class="form-control" min="1" max="{{ $pengadaan->nilai_anggaran }}"
                                        aria-label="Amount (to the nearest dollar)" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text f_nilai_hpe"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal HPE</label>
                                <input type="text" class="form-control date" id="e_tgl_hpe" name="tgl_hpe"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nomor RKS</label>
                                <input type="text" class="form-control" name="nomor_rks" id="e_nomor_rks"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal RKS</label>
                                <input type="text" class="form-control date" name="tgl_rks" id="e_tgl_rks"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="">Kebutuhan</label>
                                <select id="epr_kebutuhan" name="kebutuhan" class="form-control">
                                    <option>Spesifik</option>
                                    <option>Standard</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="">Volume</label>
                                <select id="epr_volume" name="volume" class="form-control">
                                    <option>Sedikit</option>
                                    <option>Banyak</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="">Jumlah Pengguna</label>
                                <select id="epr_jumlah_pengguna" name="jumlah_pengguna" class="form-control">
                                    <option>Satu Unit</option>
                                    <option>Lebih dari Satu Unit</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="">Penyedia</label>
                                <select id="epr_penyedia" name="penyedia" class="form-control">
                                    <option>Dalam negeri</option>
                                    <option>Luar negeri</option>
                                    <option>Dalam dan LN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="">Jumlah Vendor</label>
                                <select id="epr_jumlah_vendor" name="jumlah_vendor" class="form-control">
                                    <option>Banyak</option>
                                    <option>Cukup</option>
                                    <option>Sedikit</option>
                                </select>
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

<div class="modal fade" id="update-nodin-perencanaan-modal" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_update_nodin_perencanaan" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="nodin_pp_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Update Nota Dinas</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                                <input type="text" class="form-control" name="no_nota_dinas"
                                    id="pp_no_nota_dinas" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Nota Dinas</label>
                                <input type="text" class="form-control date" name="tgl_nota_dinas"
                                    id="pp_tgl_nota_dinas" required>
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

<div class="modal fade" id="edit-hpe-modal" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_edit_hpe" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="hpe_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Edit HPE</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Nama Item</label>
                                <input type="text" class="form-control" id="hpe_item" name="item" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Satuan</label>
                                <input type="text" class="form-control" id="hpe_satuan" name="satuan" required>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Vol 1</label>
                                <input type="text" class="form-control" id="hpe_vol_1" name="vol_1" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Vol 2</label>
                                <input type="text" class="form-control" id="hpe_vol_2" name="vol_2">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Harga Satuan</label>
                                <input type="text" class="form-control" id="hpe_harga_satuan" name="harga_satuan" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="exampleFormControlInput1">Jumlah</label>
                                <input type="text" class="form-control" id="f_hpe_jumlah" readonly>
                                <input type="hidden" class="form-control" id="hpe_jumlah" name="jumlah">
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



@if ($pengadaan->submit == 1 && $pengadaan->perencanaan == null && (Auth::user()->kategori == 'Perencana' || Auth::user()->status == 'Admin'))
    <a href="{{ url('perencana-pengadaan/form?pengadaan_id=' . $pengadaan->id) }}"
        class="btn btn-success btn-round btn-sm">
        <span class="btn-label">
            <i class="fa fa-pencil"></i>
        </span>
        Create Data Perencana Pengadaan
    </a>
@endif

@if ($pengadaan->perencanaan != null)
    <div class="row">
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Kategori Kebutuhan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->kategori_kebutuhan }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group form-group-default">
                <label>Tanggal Penggunaan</label>
                <input type="text" class="form-control"
                    value="{{ date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_penggunaan)) }}" readonly />
            </div>
        </div>
        <div class="col-md-4">
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
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->strategi_pengadaan }}"
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
                <input type="text" class="form-control"
                    value="{{ date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_hpe)) }}" readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nilai HPE</label>
                <input type="text" class="form-control"
                    value="{{ number_format($pengadaan->perencanaan->nilai_hpe) }}" readonly />
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
                <input type="text" class="form-control"
                    value="{{ date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_rks)) }}" readonly />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group form-group-default">
                <label>Kebutuhan</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->kebutuhan }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group form-group-default">
                <label>Volume</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->kebutuhan }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-group-default">
                <label>Jumlah Pengguna</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->jumlah_pengguna }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-group-default">
                <label>Penyedia</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->penyedia }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group form-group-default">
                <label>Jumlah Vendor</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->jumlah_vendor }}"
                    readonly />
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

    <a title="Update" href="#" class="btn btn-warning btn-round btn-xs mr-2 btn-update-perencanaan"
        data-id="{{ $pengadaan->perencanaan->id }}"
        data-kategori_kebutuhan="{{ $pengadaan->perencanaan->kategori_kebutuhan }}"
        data-tgl_penggunaan="{{ $pengadaan->perencanaan->tgl_penggunaan }}"
        data-waktu_pelaksanaan="{{ $pengadaan->perencanaan->waktu_pelaksanaan }}"
        data-strategi_pengadaan="{{ $pengadaan->perencanaan->strategi_pengadaan }}"
        data-jenis_kontrak="{{ $pengadaan->perencanaan->jenis_kontrak }}"
        data-nilai_hpe="{{ $pengadaan->perencanaan->nilai_hpe }}"
        data-tgl_hpe="{{ $pengadaan->perencanaan->tgl_hpe }}"
        data-nomor_rks="{{ $pengadaan->perencanaan->nomor_rks }}"
        data-tgl_rks="{{ $pengadaan->perencanaan->tgl_rks }}"
        data-kebutuhan="{{ $pengadaan->perencanaan->kebutuhan }}"
        data-volume="{{ $pengadaan->perencanaan->volume }}"
        data-jumlah_pengguna="{{ $pengadaan->perencanaan->jumlah_pengguna }}"
        data-penyedia="{{ $pengadaan->perencanaan->penyedia }}"
        data-jumlah_vendor="{{ $pengadaan->perencanaan->jumlah_vendor }}"
        >
        <i class="fa fa-edit"></i> <span>Edit</span>
    </a>

    <div class="form-group form-group-default bg-primary text-white mt-3">
        <label for=""><b class="text-white">NOTA DINAS</b></label>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Nomor Nota Dinas</label>
                <input type="text" class="form-control" value="{{ $pengadaan->perencanaan->no_nota_dinas }}"
                    readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group form-group-default">
                <label>Tanggal Nota Dinas</label>
                <input type="text" class="form-control"
                    value="{{ $pengadaan->perencanaan->tgl_nota_dinas != NULL ? date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_nota_dinas)) : '' }}" readonly />
            </div>
        </div>
    </div>

    

    
    <a title="Update" href="#" class="btn btn-primary btn-round btn-xs mr-2 btn-update-nodin-perencanaan"
        data-id="{{ $pengadaan->perencanaan->id }}"
        data-no_nota_dinas="{{ $pengadaan->perencanaan->no_nota_dinas }}"
        data-tgl_nota_dinas="{{ $pengadaan->perencanaan->tgl_nota_dinas }}">
        <i class="fa fa-pen"></i> <span>Update Nota Dinas</span>
    </a>

    <div class="form-group form-group-default bg-success text-white mt-3">
        <label for=""><b class="text-white">HPE ITEM</b></label>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-bordered-bd-success">
                <thead>
                    <tr>
                        <th style="text-align: center;" rowspan="2">#</th>
                        <th style="text-align: center;" rowspan="2">Nama Item</th>
                        <th style="text-align: center;" rowspan="2">Satuan</th>
                        <th style="text-align: center;" rowspan="2" colspan="2">Vol</th>
                        <th style="text-align: center;" colspan="2">Nilai Pekerjaan</th>
                        <th style="text-align: center;"  rowspan="2">Option</th>

                    </tr>
                    <tr>
                        <th style="text-align: center;">Harga Satuan</th>
                        <th style="text-align: center;">Jumlah</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pengadaan->perencanaan->hpeItem as $item)
                        <tr>
                            <td align="center">{{ $no++ }}</td>
                            <td>{{ $item->item }}</td>
                            <td align="center">{{ $item->satuan }}</td>
                            <td align="center" width="5%" align="center">{{ $item->vol_1 }}</td>
                            <td align="center" width="5%" align="center">{{ $item->vol_2 }}</td>
                            <td align="right">{{ number_format($item->harga_satuan) }}</td>
                            <td align="right">{{ number_format($item->jumlah) }}</td>
                            <td align="center">
                                <a href="#" class="btn btn-sm btn-rounded btn-warning btn-edit-hpe" data-id="{{ $item->id }}"
                                    data-item="{{ $item->item }}" data-satuan="{{ $item->satuan }}" data-vol_1="{{ $item->vol_1 }}" data-vol_2="{{ $item->vol_2 }}"
                                    data-harga_satuan="{{ $item->harga_satuan }}" data-jumlah="{{ $item->jumlah }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="6">TOTAL</th>
                        <th id="total_hpe" style="text-align: right">
                            {{ number_format($pengadaan->perencanaan->hpeItem->sum('jumlah')) }}
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="form-group form-group-default">
        <label for="">File Upload</label>
        @if ($pengadaan->perencanaan->perencanaanFile != null)
            @if ($pengadaan->perencanaan->perencanaanFile->file_rks != null)
                <a href="{{ asset($pengadaan->perencanaan->perencanaanFile->file_rks) }}" class="text-primary">File
                    RKS</a><br>
            @endif
            @if ($pengadaan->perencanaan->perencanaanFile->file_hpe != null)
                <a href="{{ asset($pengadaan->perencanaan->perencanaanFile->file_hpe) }}" class="text-primary">File
                    HPE</a><br>
            @endif
            @if ($pengadaan->perencanaan->perencanaanFile->file_pakta_integritas != null)
                <a href="{{ asset($pengadaan->perencanaan->perencanaanFile->file_pakta_integritas) }}"
                    class="text-primary">File Fakta Integritas</a><br>
            @endif
            @if ($pengadaan->perencanaan->perencanaanFile->file_drp != null)
                <a href="{{ asset($pengadaan->perencanaan->perencanaanFile->file_drp) }}" class="text-primary">File
                    DRP</a><br>
            @endif
            @if ($pengadaan->perencanaan->perencanaanFile->file_nota_dinas != null)
                <a href="{{ asset($pengadaan->perencanaan->perencanaanFile->file_nota_dinas) }}"
                    class="text-primary">File Nota Dinas GM ke Laksda</a><br>
            @endif
        @endif
        <a href="#" data-toggle="modal" data-target="#create-perencanaan-file-modal"><span
                class="badge badge-success">Upload File</span></a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('perencana-pengadaan/drp-export?id=' . $pengadaan->id) }}" class="btn btn-primary">Export
                DRP</a>
            <a href="{{ url('perencana-pengadaan/pakta_integritas-export?id=' . $pengadaan->id) }}"
                class="btn btn-primary">Export
                Pakta Integritas</a>
            <a href="{{ url('perencana-pengadaan/hpe-export?id=' . $pengadaan->id) }}" class="btn btn-primary">Export
                HPE</a>
        </div>
    </div>
    <br>
@endif

@if ($pengadaan->perencanaan != null &&
    $pengadaan->perencanaan->submit == 0 &&
    Auth::user()->kategori == 'Perencana')
    <a href="#" class="btn btn-success btn-round btn-sm btn-submit-perencanaan">
        <span class="btn-label">
            <i class="fa fa-check"></i>
        </span>
        Submit Data Perencana Pengadaan
    </a>
@endif
