<div class="modal fade" id="create-amandemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_amandemen">
                @csrf
                <input type="hidden" value="{{ $pengadaan->id }}" name="pengadaan_id">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Create Amandemen</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nomor Nota Dinas</label>
                                <input type="text" class="form-control" name="no_nota_dinas" required>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nomor Amandemen</label>
                                <input type="text" class="form-control" name="nomor_amandemen" required>
                            </div>
                        </div>
                        <div class="col-md-6">
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

<div class="modal fade" id="selesai-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_selesai">
                @csrf
                <input type="hidden" name="id" value="{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pekerjaan Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <div class="input-group">
                            <input type="text" class="form-control datepicker" name="tgl_selesai">
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

<div class="modal fade" id="penilaian-file-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_penilaian_file" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="pv_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">File Peilaian Vendor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <label>File</label>
                        <input type="file" class="form-control" name="file" required>
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

<div class="modal fade" id="edit-nilai-f1-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_edit_nilai_f1">
                @csrf
                <input type="hidden" name="id" id="f1_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" step="any" class="form-control" name="nilai" id="f1_nilai">
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

<div class="modal fade" id="edit-nilai-f2-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_edit_nilai_f2">
                @csrf
                <input type="hidden" name="id" id="f2_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nilai</label>
                        <input type="number" step="any" class="form-control" name="nilai" id="f2_nilai">
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

<div class="modal fade" id="edit-tgl-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="form_edit_tgl">
                @csrf
                <input type="hidden" name="id" id="e_tgl_id">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tgl. Penilaian</label>
                        <input type="text" name="tgl_penilaian" id="e_tgl_penilaian" required class="form-control date">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">DPT / Non DPT</label>
                        <select class="form-control" name="dpt_non_dpt" id="e_dpt_non_dpt" required>
                            <option value=""></option>
                            <option>DPT Jasa Konstruksi JTM, Gardu Distribusi dan JTR</option>
                            <option>DPT Jasa Konstruksi SR dan APP</option>
                            <option>DPT Jasa Grinding dan Polishing Crankshaft Mesin Diesel</option>
                            <option>DPT Jasa Rekondisi Sparepart Mesin Diesel</option>
                            <option>Non DPT</option>
                        </select>
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
    <div class="col-md-12">
        @if($pengadaan->pelaksanaan != null)

        <div class="form-group form-group-default">
            <label>Nama Pekerjaan</label>
            <input type="text" class="form-control" value="{{ $pengadaan->nama }}"
                readonly />
        </div>

        <div class="row">
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Nomor Kontak</label>
                    <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->nomor_kontrak }}"
                        readonly />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Tgl. Kontrak</label>
                    <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_kontrak }}"
                        readonly />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Penyedia Barang / Jasa</label>
                    <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->mitra->nama }}"
                        readonly />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Tgl. Efektif</label>
                    <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_efektif }}"
                        readonly />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Tgl. Akhir</label>
                    <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_akhir }}" readonly />
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group form-group-default">
                    <label>Nilai Kontrak</label>
                    <input type="text" class="form-control"
                        value="{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}" readonly />
                </div>
            </div>
        </div>
    
    
        


        <div class="form-group form-group-default">
            <label for="">File Upload</label>
            <br>
            @if ($pengadaan->pelaksanaan->pelaksanaanFile != null)
            
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_kontrak != null)
            <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_kontrak) }}" class="text-primary">File Kontrak</a><br>
            @endif
            @if ($pengadaan->pelaksanaan->pelaksanaanFile->file_jaminan_pelaksana != null)
            <a href="{{ asset($pengadaan->pelaksanaan->pelaksanaanFile->file_jaminan_pelaksana) }}" class="text-primary">File Jaminan Pelaksanaan</a><br>
            @endif
            @endif
        </div>
    
        @endif
        <h3>Amandemen Kontrak</h3>

        <table class="display table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No. Nota Dinas</th>
                    <th>Tanggal Nota Dinas</th>
                    <th>No. Amandemen</th>
                    <th>Tanggal Amandemen</th>
                    <th>Tanggal Akhir</th>
                    <th>File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengadaan->amandemen as $amd)
                    <tr>
                        <td>{{ $amd->no_nota_dinas }}</td>
                        <td>{{ date('d-m-Y', strtotime($amd->tgl_nota_dinas)) }}</td>
                        <td>{{ $amd->nomor_amandemen }}</td>
                        <td>{{ date('d-m-Y', strtotime($amd->tgl_amandemen)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($amd->tgl_akhir)) }}</td>
                        <td>
                            @foreach ($amd->amandemenFile as $file)
                            <a href="{{ asset($file->file) }}" class="text-primary"><i class="fa fa-file"></i> {!! $file->file !!}</a><br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        @if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->tgl_selesai == null)
        <a href="#" class="btn btn-info btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#create-amandemen">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Create Amandemen
        </a>
        @endif
    </div>
</div> 
<hr>
<div class="row">
    <div class="col-md-12">
        @if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->tgl_selesai != null)
        <h3>Pekerjaan Selesai</h3>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_selesai }}" disabled />
        </div>
        @endif

        @if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->tgl_selesai == null)
        <a href="#" class="btn btn-success btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#selesai-modal">
            <span class="btn-label">
                <i class="fa fa-check"></i>
            </span>
            Pekerjaan Selesai
        </a>
        @endif

    </div>
</div>



<hr>


@if($pengadaan->pelaksanaan != null && ($pengadaan->pelaksanaan->tgl_selesai != null || strtotime($pengadaan->pelaksanaan->tgl_akhir) <= strtotime(date('Y-m-d'))) && $pengadaan->pelaksanaan->penilaianVendor == null)
    <h3>Penilaian Kinerja Vendor</h3>
    <div class="row mt-3">
        <div class="col-md-2">
            <a href="{{ url('penilaian/form-errect?id=' . $pengadaan->id) }}"
                class="btn btn-danger btn-round form-control">Form Errect Only</a>
        </div>
        <div class="col-md-2">
            <a href="{{ url('penilaian/form-supply-only?id=' . $pengadaan->id) }}"
                class="btn btn-warning btn-round form-control">Form Supply Only</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('penilaian/form-supply-errect?id=' . $pengadaan->id) }}"
                class="btn btn-success btn-round form-control">Form Supply Errect</a>
        </div>
        <div class="col-md-3">
            <a href="{{ url('penilaian/form-khs_distribusi_niaga?id=' . $pengadaan->id) }}"
                class="btn btn-primary btn-round form-control">Form KHS Distribusi & Niaga</a>
        </div>
        <div class="col-md-2">
            <a href="{{ url('penilaian/form-lainnya?id=' . $pengadaan->id) }}"
                class="btn btn-info btn-round form-control">Form Lainnya</a>
        </div>
    </div>
@endif
                    
    @if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor != null)
                    @if($pengadaan->pelaksanaan->penilaianVendor->form == 'Errect' ||
                    $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Only' ||
                    $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Errect')
                    <div class="row mt-3">

                        <h3>Form Penilaian Vendor ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</h3>
                        
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="text" name="tgl_peilaian" readonly class="form-control" value="{{ date('d-m-Y', strtotime($pengadaan->pelaksanaan->penilaianVendor->tgl_penilaian)) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">DPT / Non DPT</label>
                                        <input type="text" name="tgl_peilaian" readonly class="form-control" value="{{ $pengadaan->pelaksanaan->penilaianVendor->dpt_non_dpt }}">
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">

                                    <div class="form-group">
                                        {{-- <label for="">Opt</label> --}}
                                        <button class="btn btn-rounded btn-warning form-control mt-4 btn-edit-tgl" data-id="{{ $pengadaan->pelaksanaan->penilaianVendor->id }}"
                                            data-tgl_penilaian="{{ $pengadaan->pelaksanaan->penilaianVendor->tgl_penilaian }}" data-cat="{{ $pengadaan->pelaksanaan->penilaianVendor->dpt_non_dpt }}">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive mt-3">
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
                                    @foreach($pengadaan->pelaksanaan->penilaianVendor->formPenilaian as $u)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $u->kriteria }}</td>
                                        <td>{{ $u->bobot . '%' }} </td>
                                        <td align="center">
                                            <a href="#" class="btn-edit-nilai-f1" data-id="{{ $u->id }}" data-nilai="{{ $u->nilai }}"><b>{{ $u->nilai }}</b></a>
                                        </td>
                                        <td align="right"><b>{{ $u->nilai_bobot }}</b></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td align="right">{{ $pengadaan->pelaksanaan->penilaianVendor->total }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td align="right">{{ $pengadaan->pelaksanaan->penilaianVendor->kategori }}</td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td colspan="4" align="right">{{ $pengadaan->pelaksanaan->penilaianVendor->ket }}</td>
                                    </tr>
                                    @if($pengadaan->pelaksanaan->penilaianVendor->file != null)
                                    <tr>
                                        <th>File</th>
                                        <td align="right" colspan="4"><a href="{{ url($pengadaan->pelaksanaan->penilaianVendor->file) }}">{{ $pengadaan->pelaksanaan->penilaianVendor->file }}</a></td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                        @else
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <h3>Form Penilaian Vendor ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</h3>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tanggal</label>
                                        <input type="text" name="tgl_peilaian" readonly class="form-control" value="{{ date('d-m-Y', strtotime($pengadaan->pelaksanaan->penilaianVendor->tgl_penilaian)) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">DPT / Non DPT</label>
                                        <input type="text" name="tgl_peilaian" readonly class="form-control" value="{{ $pengadaan->pelaksanaan->penilaianVendor->dpt_non_dpt }}">
                                        
                                    </div>
                                </div>

                                <div class="col-md-2">

                                    <div class="form-group">
                                        {{-- <label for="">Opt</label> --}}
                                        <button class="btn btn-rounded btn-warning form-control mt-4 btn-edit-tgl" data-id="{{ $pengadaan->pelaksanaan->penilaianVendor->id }}"
                                            data-tgl_penilaian="{{ $pengadaan->pelaksanaan->penilaianVendor->tgl_penilaian }}" data-cat="{{ $pengadaan->pelaksanaan->penilaianVendor->dpt_non_dpt }}">Edit</button>
                                    </div>
                                </div>

                                
                            </div>

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
                                    @foreach($pengadaan->pelaksanaan->penilaianVendor->formKhs as $khs)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td colspan="4"><b>{{ $khs->nama }}</b></td>
                                    </tr>
                                    @foreach($khs->formKhsDetail as $khsDetail)
                                    <tr>
                                        <td></td>
                                        <td><i>{{ $khsDetail->kriteria }}</i></td>
                                        <td>{{ $khsDetail->bobot }} </td>
                                        <td align="center">
                                            <a href="#" class="btn-edit-nilai-f2" data-id="{{ $khsDetail->id }}" data-nilai="{{ $khsDetail->nilai }}"><b>{{ $khsDetail->nilai }}</b></a>
                                            
                                        </td>
                                        <td align="right"><b>{{ $khsDetail->nilai_bobot }}</b></td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td align="right"><b>{{ $pengadaan->pelaksanaan->penilaianVendor->total }}</b></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td align="right"><b>{{ $pengadaan->pelaksanaan->penilaianVendor->kategori }}</b></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td colspan="4">{{ $pengadaan->pelaksanaan->penilaianVendor->ket }}</td>
                                    </tr>
                                    @if($pengadaan->pelaksanaan->penilaianVendor->file != null)
                                    <tr>
                                        <th>File</th>
                                        <td align="right" colspan="4"><a href="{{ url($pengadaan->pelaksanaan->penilaianVendor->file) }}">{{ $pengadaan->pelaksanaan->penilaianVendor->file }}</a></td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                            </div>
                        </div>
                        @endif

                            
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-rounded btn-success btn-upload-file-nilai" data-toggle="modal" data-target="#penilaian-file-modal" data-id="{{ $pengadaan->pelaksanaan->penilaianVendor->id }}">Upload File Penilaian</a>
                                    <a href="{{ url('penilaian/export?id=' . $pengadaan->id) }}" class="btn btn-rounded btn-info">Export Penilaian Kinerja Vendor</a>
                                </div>
                            @endif
