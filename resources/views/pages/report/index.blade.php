{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <!-- <em class="icon ni ni-search"></em> -->
        <!-- <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search files, folders"> -->
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='{{$subtitle}}'></i>  {{strtoupper($subtitle)}}</h4>
    </div>
    <div class="nk-fmg-actions">
    </div>
</div>
<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-csenter">
          <div class="col-md-12" align="center">
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
          </div>
        </div>
        <div class="col-md-12" align="center">
            <strong>Loading...</strong>
        </div>
    </div>
</div>
<div class="card d-none" id="filterrow">
    <div class="card-body" style="background:#f7f9fd">
        <div class="row gy-3" >
            
        </div>
    </div>
    <!-- <div class="card-footer" style="background:#fff" align="right"> -->
    <div class="card-footer" style="background:#f7f9fd; padding-top:0px !important;">
        <div class="btn-group">
            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-dark" onclick="filterclear()"><em class="icon ti-eraser"></em> <span>Clear Filter</span></a> -->
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="filterdata()"><em class="icon ti-reload"></em> <span>Submit Filter</span></a>
        </div>
    </div>
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="card">
            <div class="card-body">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Chart di atas akan menampilkan grafik frekunsi aduan berdasarkan jenis aduan.
                    </p>
                </figure>
            </div>
        </div>
    </div>
<!-- </div> -->

@endsection

@push('script')
<?php
  $jenis_aduan_name = [];
  $jenis_aduan_frekuensi = [];
  foreach($jenis_aduans as $jenis){
      $n = 0;
      $name = $jenis->jenis_aduan;
      $n = $aduans->where('jenis_aduan_id', $jenis->id)->count();
      array_push($jenis_aduan_frekuensi, $n);
      array_push($jenis_aduan_name, $name);
  }
?>
<script>
    var frekuensi = <?php echo json_encode($jenis_aduan_frekuensi); ?>;
    var categories = <?php echo json_encode($jenis_aduan_name); ?>;
   Highcharts.chart('container', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'Aktivitas Aduan Berdasarkan Jenis Aduan'
    },
    xAxis: {
        categories: categories,
    },
    yAxis: {
        title: {
            text: 'Frekuensi Aduan'
        },
        labels: {
            formatter: function () {
                return this.value ;
            }
        }
    },
    tooltip: {
        crosshairs: true,
        shared: true
    },
    plotOptions: {
        spline: {
            marker: {
                radius: 4,
                lineColor: '#666666',
                lineWidth: 1
            }
        }
    },
    series: [{
        name: 'Jenis Aduan',
        marker: {
            symbol: 'square'
        },
        data: frekuensi,

    }]
});
           
  </script>

@endpush

