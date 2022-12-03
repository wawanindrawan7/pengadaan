@extends('layouts.master')

@section('content')
<div class="row">

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-info">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Inisasi</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($inisiasi) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-warning">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Perencana Pengadaan</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($perencana) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-danger">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-cogs"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Pelaksana Pengadaan</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($pelaksana) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-md-3">
        <div class="card card-stats card-round card-success">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center bubble-shadow-small">
                            <i class="fa fa-cogs"></i>
                        </div>
                    </div>
                    <div class="col col-stats ml-3 ml-sm-0">
                        <div class="numbers">
                            <p class="card-category">Manajemen Kontrak</p>
                            <h4 class="card-title"><a href="#" class="text-light">{{ count($kontrak) }}</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Statistik Pengadaan</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="pengadaan_langsung"></div>
                        <h6 class="fw-bold mt-3 mb-0">Pengadaan Langsung</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="penunjukan_langsung"></div>
                        <h6 class="fw-bold mt-3 mb-0">Penunjukan Langsung</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="tender_terbatas"></div>
                        <h6 class="fw-bold mt-3 mb-0">Tender Terbatas</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="tender_terbuka"></div>
                        <h6 class="fw-bold mt-3 mb-0">Tender Terbuka</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="kontrak_rinci"></div>
                        <h6 class="fw-bold mt-3 mb-0">Kontrak Rinci</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="card full-height">
            <div class="card-body">
                <div class="card-title">Statistik Penilaian Kinerja Vendor</div>
                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="baik"></div>
                        <h6 class="fw-bold mt-3 mb-0">Baik</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="cukup"></div>
                        <h6 class="fw-bold mt-3 mb-0">Cukup</h6>
                    </div>
                    <div class="px-2 pb-2 pb-md-0 text-center">
                        <div id="buruk"></div>
                        <h6 class="fw-bold mt-3 mb-0">Buruk</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    
</div>
@endsection
@section('js')
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="{{ asset('public/atlantis/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script>
   Circles.create({
			id:'pengadaan_langsung',
			radius:45,
			value:{{ $pengadaan_langsung }},
			maxValue:{{ $total }},
			width:7,
			text: {{ $pengadaan_langsung }},
			colors:['#f1f1f1', '#8cc265'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

        Circles.create({
			id:'penunjukan_langsung',
			radius:45,
			value:{{ $penunjukan_langsung }},
			maxValue:{{ $total }},
			width:7,
			text: {{ $penunjukan_langsung }},
			colors:['#f1f1f1', '#d18f52'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

        Circles.create({
			id:'tender_terbatas',
			radius:45,
			value:{{ $tender_terbatas }},
			maxValue:{{ $total }},
			width:7,
			text: {{ $tender_terbatas }},
			colors:['#f1f1f1', '#c24038'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
        Circles.create({
			id:'tender_terbuka',
			radius:45,
			value:{{ $tender_terbuka }},
			maxValue:{{ $total }},
			width:7,
			text: {{ $tender_terbuka }},
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
        Circles.create({
			id:'kontrak_rinci',
			radius:45,
			value:{{ $kontrak_rinci }},
			maxValue:{{ $total }},
			width:7,
			text: {{ $kontrak_rinci }},
			colors:['#f1f1f1', '#528bff'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

    Circles.create({
			id:'baik',
			radius:45,
			value:{{ $baik }},
			maxValue:{{ ($baik + $cukup + $buruk) }},
			width:7,
			text: {{ $baik }},
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'cukup',
			radius:45,
			value:{{ $cukup }},
			maxValue:{{ ($baik + $cukup + $buruk) }},
			width:7,
			text: {{ $cukup }},
			colors:['#f1f1f1', '#47ABF7'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
    Circles.create({
			id:'buruk',
			radius:45,
			value:{{ $buruk }},
			maxValue:{{ ($baik + $cukup + $buruk) }},
			width:7,
			text: {{ $buruk }},
			colors:['#f1f1f1', '#F15860'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
</script>
@endsection
