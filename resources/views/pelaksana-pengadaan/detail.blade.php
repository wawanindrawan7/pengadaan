@extends('layouts.master')
@section('content')
    <div class="col-md-12">

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
                                    @foreach ($mitra as $item)
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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail Pengadaan</h4>
            </div>
            <div class="card-body">

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
                            <input type="text" class="form-control" value="{{ $pengadaan->unit->nama }}" disabled />
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
                            <input type="text" class="form-control"
                                value="{{ number_format($pengadaan->nilai_anggaran) }}" disabled />
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
                            <input type="text" class="form-control" value="{{ $pengadaan->metode_pengadaan }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Nomor Nota Dinas</label>
                            <input type="text" class="form-control" value="{{ $pengadaan->no_nota_dinas }}"
                                disabled />
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
                            <input type="text" class="form-control" value="{{ $pengadaan->direksiPk->users->name }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Pengawas Pekerjaan</label>
                            <input type="text" class="form-control" value="{{ $pengadaan->pengawasPk->users->name }}"
                                disabled />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label>Pengawas K3</label>
                            <input type="text" class="form-control" value="{{ $pengadaan->pengawasK3->users->name }}"
                                disabled />
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
                    @foreach ($pengadaan->pengadaanFile as $file)
                        <a href="{{ asset($file->file) }}" class="text-primary">{!! $file->kategori . ' (' . $file->file . ')' !!}</a><br>
                    @endforeach
                </div>

                <div class="form-group form-group-default bg-info">
                    <label class="text-white"><b>Perencana Pengadaan</b></label>
                </div>


                @if ($pengadaan->perencanaan == null)
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
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->kategori_kebutuhan }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Tanggal Penggunaan</label>
                                <input type="text" class="form-control"
                                    value="{{ date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_penggunaan)) }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Waktu Pelaksanaan</label>
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->waktu_pelaksanaan }}" readonly />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Strategi Pengadaan</label>
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->strategi_pengadaan }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Jenis Kontrak</label>
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->jenis_kontrak }}" readonly />
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
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->nomor_rks }}" readonly />
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
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Nomor Nota Dinas</label>
                                <input type="text" class="form-control"
                                    value="{{ $pengadaan->perencanaan->no_nota_dinas }}" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tanggal Nota Dinas</label>
                                <input type="text" class="form-control"
                                    value="{{ date('d-m-Y', strtotime($pengadaan->perencanaan->tgl_nota_dinas)) }}"
                                    readonly />
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group-default bg-success text-white">
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
                                        {{-- <th style="text-align: center;"  rowspan="2">Option</th> --}}

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
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6">TOTAL</th>
                                        <th id="total_hpe" style="text-align: right">
                                            {{ number_format($pengadaan->perencanaan->hpeItem->sum('jumlah')) }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ url('perencana-pengadaan/drp-export?id=' . $pengadaan->id) }}">Export DRP</a>
                        </div>
                    </div>
                    <br>
                    <div class="form-group form-group-default bg-info">
                        <label class="text-white"><b>Pelaksana Pengadaan</b></label>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            @if ($pengadaan->pelaksanaan == null)
                                <a href="#" data-toggle="modal" data-target="#create-pelaksanaan"
                                    class="btn btn-success btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Create Data Pelaksana Pengadaan
                                </a>
                            @else
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Nomor Kontak</label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengadaan->pelaksanaan->nomor_kontrak }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tgl. Kontrak</label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengadaan->pelaksanaan->tgl_kontrak }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Penyedia Barang / Jasa</label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengadaan->pelaksanaan->mitra->nama }}" readonly />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tgl. Efektif</label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengadaan->pelaksanaan->tgl_efektif }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Tgl. Akhir</label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengadaan->pelaksanaan->tgl_akhir }}" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-group-default">
                                            <label>Nilai Kontrak</label>
                                            <input type="text" class="form-control"
                                                value="{{ number_format($pengadaan->pelaksanaan->nilai_kontrak) }}"
                                                readonly />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group form-group-default">
                                    <label for="">FILE UPLOAD</label>
                                    @foreach ($pengadaan->pelaksanaan->pelaksanaanFile as $file)
                                        <a href="{{ asset($file->file) }}"
                                            class="text-primary">{!! $file->kategori . ' (' . $file->file . ')' !!}</a><br>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <br>
                    <div class="form-group form-group-default bg-info">
                        <label class="text-white"><b>Manajemen Kontrak</b></label>
                    </div>
                    @if ($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor == null)
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

                    @if ($pengadaan->pelaksanaan != null && $pengadaan->pelaksanaan->penilaianVendor != null)
                        @if ($pengadaan->pelaksanaan->penilaianVendor->form == 'Errect' ||
                            $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Only' ||
                            $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Errect')
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head-row">
                                                <div class="card-title">Form Penilaian Vendor
                                                    ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                                    @foreach ($pengadaan->pelaksanaan->penilaianVendor->formPenilaian as $u)
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
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <div class="card-head-row">
                                                <div class="card-title">Form Penilaian Vendor
                                                    ({{ $pengadaan->pelaksanaan->penilaianVendor->form }})</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
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
                                                    @foreach ($pengadaan->pelaksanaan->penilaianVendor->formKhs as $khs)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td colspan="4"><b>{{ $khs->nama }}</b></td>
                                                        </tr>
                                                        @foreach ($khs->formKhsDetail as $khsDetail)
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
                                    </div>
                                </div>
                            </div>

                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="{{ url('penilaian-pengadaan/drp-export?id=' . $pengadaan->id) }}">Export Penilaian Kinerja Vendor</a>
                                </div>
                            </div>
                    @endif
                @endif
                @if ($pengadaan->perencanaan != null && $pengadaan->perencanaan->submit == 0)
                    <a href="#" class="btn btn-success btn-round btn-sm btn-submit">
                        <span class="btn-label">
                            <i class="fa fa-check"></i>
                        </span>
                        Submit Data Perencana Pengadaan
                    </a>
                @endif




            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script>
        $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
        });

        $(document).on('input','#nilai_kontrak', function(){
            var nilai_kontrak = $('#nilai_kontrak').val()
            $('.f_nilai_kontrak').text(nf.format(nilai_kontrak))
        })

        $('#form_pelaksanaan').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pelaksanaan/create') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    console.log(r)
                    if (r == 'success') {
                        swal("Good job!", "Simpan data berhasil !", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            location.reload()
                        });
                    }
                }
            })
        });

        $(document).on('click', '.btn-submit', function(e) {
            e.preventDefault()
            swal({
                title: 'Yakin untuk submit ?',
                text: "Submit data pengadaan",
                type: 'warning',
                buttons: {
                    confirm: {
                        text: 'Yes, submit it!',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((Submit) => {
                if (Submit) {
                    $.ajax({
                        type: 'GET',
                        url: "{{ url('pelaksana-pengadaan/submit') }}",
                        data: {
                            id: "{{ $pengadaan->pelaksanaan != null ? $pengadaan->pelaksanaan->id : '' }}"
                        },
                        success: function(r) {
                            console.log(r)
                            if (r == 'success') {
                                swal("Good job!", "Submit pengadaan berhasil !", {
                                    icon: "success",
                                    timer: 1000,
                                    buttons: {
                                        confirm: {
                                            className: 'btn btn-success'
                                        }
                                    },
                                }).then(function() {
                                    location.reload()
                                });
                            }
                        }
                    })

                } else {
                    swal.close();
                }
            });
        })

        $('#pengadaan_file').on('submit', function(e) {
            e.preventDefault()
            $.ajax({
                type: 'POST',
                url: "{!! url('pengadaan/file/create') !!}",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(r) {
                    console.log(r)
                    if (r == 'success') {
                        swal("Good job!", "Simpan data berhasil !", {
                            icon: "success",
                            buttons: {
                                confirm: {
                                    className: 'btn btn-success'
                                }
                            },
                        }).then(function() {
                            location.reload()
                        });
                    }
                }
            })
        });
    </script>
@endsection
