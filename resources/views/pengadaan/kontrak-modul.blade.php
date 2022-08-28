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


<div class="row">
    <div class="col-md-12">
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



        <a href="#" class="btn btn-info btn-round btn-sm mr-2" data-toggle="modal"
            data-target="#create-amandemen">
            <span class="btn-label">
                <i class="fa fa-plus"></i>
            </span>
            Create Amandemen
        </a>
    </div>
</div> 
<hr>
<div class="row">
    <div class="col-md-12">
        <h3>Pekerjaan Selesai</h3>

        <div class="form-group">
            <input type="text" class="form-control" value="{{ $pengadaan->pelaksanaan->tgl_selesai }}" disabled />
        </div>

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

@if($pengadaan->perencanaan != null)
@if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor == null)
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
                    
    @if($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor != null)
                    @if($pengadaan->pelaksanaan->penilaianVendor->form == 'Errect' ||
                    $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Only' ||
                    $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Errect')
                    <div class="row mt-3">

                        <h3>Form Penilaian Vendor ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</h3>

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
                                    @foreach($pengadaan->pelaksanaan->penilaianVendor->formPenilaian as $u)
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
                                        <td>{{ $pengadaan->pelaksanaan->penilaianVendor->total }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td>{{ $pengadaan->pelaksanaan->penilaianVendor->kategori }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        @else
                        <div class="row mt-3">
                            <div class="col-md-12">
                            <h3>Form Penilaian Vendor ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</h3>

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
                                        <td>{{ $khsDetail->nilai }}</td>
                                        <td>{{ $khsDetail->nilai_bobot }}</td>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td>{{ $pengadaan->pelaksanaan->penilaianVendor->total }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Kategori</th>
                                        <td>{{ $pengadaan->pelaksanaan->penilaianVendor->kategori }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                            
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('penilaian-pengadaan/drp-export?id=' . $pengadaan->id) }}">Export Penilaian Kinerja Vendor</a>
                                </div>
                            </div>
                            @endif
     @endif