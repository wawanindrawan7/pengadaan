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

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Grafik Pengadaan</div>
                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2" data-toggle="modal"
                            data-target="#create-modal">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Create
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div id="chartdiv" style="width: 100%;height: 550px;"></div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@section('js')
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script>
    am5.ready(function () {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        // start and end angle must be set both for chart and series
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
            startAngle: 180,
            endAngle: 360,
            layout: root.verticalLayout,
            innerRadius: am5.percent(50)
        }));

        // Create series

        // start and end angle must be set both for chart and series
        var series = chart.series.push(am5percent.PieSeries.new(root, {
            startAngle: 180,
            endAngle: 360,
            valueField: "value",
            categoryField: "kategori",
            alignLabels: false
        }));

        series.states.create("hidden", {
            startAngle: 180,
            endAngle: 180
        });

        series.slices.template.setAll({
            cornerRadius: 5
        });

        series.ticks.template.setAll({
            forceHidden: true
        });

        // Set data

        series.data.setAll(@json($chart_data, JSON_PRETTY_PRINT));

        series.appear(1000, 100);

    });
</script>
@endsection
