@extends('layouts.master')
@section('content')
    <div class="col-md-12">
        <div class="card card-with-nav">
            <div class="card-header">
                <div class="row row-nav-line">
                    <ul class="nav nav-tabs nav-line nav-color-secondary w-100 pl-4" role="tablist">
                        @if (Auth::id() == $pengadaan->users_id ||
                            Auth::user()->kategori == 'Perencana' ||
                            Auth::user()->kategori == 'Pelaksana')
                            <li class="nav-item submenu"> <a class="nav-link {{ $tab == 'inisiasi' ? 'active show' : '' }}"
                                    data-tag="inisiasi" data-toggle="tab" href="#inisiasi" role="tab"
                                    aria-selected="false">Inisiasi Pengadaan</a> </li>
                        @endif
                        @if (Auth::id() == $pengadaan->users_id ||
                            Auth::user()->kategori == 'Perencana' ||
                            Auth::user()->kategori == 'Pelaksana')
                            @if ($pengadaan->metode_pengadaan != 'Kontrak Rinci' || $pengadaan->metode_pengadaan != 'Pengadaan Langsung')
                                <li class="nav-item submenu"> <a
                                        class="nav-link {{ $tab == 'perencana' ? 'active show' : '' }}" data-tag="perencana"
                                        data-toggle="tab" href="#perencana" role="tab" aria-selected="false">Perencana
                                        Pengadaan</a> </li>
                            @endif
                        @endif

                        @if (Auth::id() == $pengadaan->users_id ||
                            Auth::user()->kategori == 'Perencana' ||
                            Auth::user()->kategori == 'Pelaksana')
                            <li class="nav-item submenu"> <a class="nav-link {{ $tab == 'pelaksana' ? 'active show' : '' }}"
                                    data-tag="pelaksana" data-toggle="tab" href="#pelaksana" role="tab"
                                    aria-selected="false">Pelaksana
                                    Pengadaan</a> </li>
                        @endif
                        <li class="nav-item submenu"> <a class="nav-link {{ $tab == 'kontrak' ? 'active show' : '' }}"
                                data-tag="kontrak" data-toggle="tab" href="#kontrak" role="tab"
                                aria-selected="false">Manajemen Kontrak</a> </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content mt-2 mb-3">
                    <div class="tab-pane fade {{ $tab == 'inisiasi' ? 'active show' : '' }}" id="inisiasi" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        @include('pengadaan.pengadaan-modul')
                    </div>
                    @if ($pengadaan->metode_pengadaan != 'Kontrak Rinci' || $pengadaan->metode_pengadaan != 'Pengadaan Langsung')
                        <div class="tab-pane fade {{ $tab == 'perencana' ? 'active show' : '' }}" id="perencana"
                            role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('pengadaan.perencana-modul')
                        </div>
                    @endif
                    <div class="tab-pane fade {{ $tab == 'pelaksana' ? 'active show' : '' }}" id="pelaksana" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        @include('pengadaan.pelaksana-modul')
                    </div>
                    <div class="tab-pane fade {{ $tab == 'kontrak' ? 'active show' : '' }}" id="kontrak" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        @include('pengadaan.kontrak-modul')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{ asset('public/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/moment/moment.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('public/atlantis/assets/js/plugin/select2/select2.full.min.js') }}"></script>
    <script>
        $('.datepicker').datetimepicker({
            format: 'YY/MM/DD',
        });

        var tab = "{{ $tab }}"
        console.log(tab)
        $(document).on('click', '.nav-link', function(e) {
            e.preventDefault()
            var tag = $(this).data('tag')
            console.log(tag)
        })
    </script>

    @include('pengadaan.pengadaan-script')
    @include('pengadaan.perencana-script')
    @include('pengadaan.pelaksana-script')
    @include('pengadaan.kontrak-script')
@endsection
