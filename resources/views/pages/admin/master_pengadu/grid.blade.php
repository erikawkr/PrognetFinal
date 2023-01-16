{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='Data'></i>  {{strtoupper("Pengaduan ")}}</h4>
    </div>
    <div class="nk-fmg-actions">
    </div>
</div>
<div class="row gy-3 d-none" id="loaderspin">
    <div class="col-md-12">
        <div class="col-md-12" align="center">
            &nbsp;
        </div>
        <div class="d-flex align-items-center">
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
</div>

<!-- <div class="nk-fmg-body-content"> -->
    <div class="nk-fmg-quick-list nk-block">
        <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Ajukan Aduan</h5>
                  <p class="card-text">Sampaikan laporan, kritik maupun saran perbaikan Anda dengan klik tombol dibawah ini.</p>
                  <a href="{{ route('trx_generate.create') }}" class="btn btn-primary" onclick="buttondisable(this)"> <span>Tambah Aduan</span></a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Lihat Pegaduan</h5>
                  <p class="card-text">Untuk dapat melihat aduan yang telah anda buat sebelumnya, silahkan masukkan nomor aduan Anda.</p>
                  <a href="{{ route('user.aduan_responder.index') }}" class="btn btn-primary" onclick="buttondisable(this)"> <span>Cek Pengaduan</span></a>
                </div>
              </div>
            </div>
          </div>
    </div>
<!-- </div> -->

@endsection
