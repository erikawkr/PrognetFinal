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
        <div class="btn-group">
            <!-- <a href="#" target="_blank" class="btn btn-sm btn-success"><em class="icon ti-files"></em> <span>Export Data</span></a> -->
            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDefault">Modal Default</button> -->
            <!-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalDefault"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
            <!-- <a href="javascript:void(0)" class="btn btn-sm btn-success" onclick="filtershow()"><em class="icon ti-file"></em> <span>Filter Data</span></a> -->
            <a href="{{ route('master_respon.index') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
        </div>
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
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
                @endif
                <form action="{{route('master_respon.update', $respon->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    <div class="form-body">
                        <div class="form-group">
                            <label>Kode</label>
                            <input type="text" name="kode" class="form-control @error('kode') is invalid @enderror"
                                placeholder="Masukkan Kode" value="{{ $respon->kode }}" >
                                @error('kode')
                                    <div class="invalid-feedback" style="display:block;">
                                        {{  $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control @error('nama') is invalid @enderror"
                                placeholder="Masukkan Nama" value="{{ $respon->nama }}" >
                                @error('nama')
                                    <div class="invalid-feedback" style="display:block;">
                                        {{  $message }}
                                    </div>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Spesialisasi</label>
                            <select class="custom-select" name="spesialisasi_id" aria-label="Default select example">
                                <option value="" selected>Open this select menu</option>
                                @foreach ($spesialisasi as $spes)     
                                <option value="{{ $spes->id }}"{{ $spes->id == $respon->spesialisasi_id ? 'selected' : '' }}>{{ $spes->nama}}</option>
                                @endforeach
                            </select>
                            @error('spesialisasi_id')
                                    <div class="invalid-feedback" style="display:block;">
                                    {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Jenis Profesi</label>
                            <select class="custom-select" name="jenis_profesi_id" aria-label="Default select example">
                                <option value="" selected>Open this select menu</option>
                                @foreach ($jenis_profesi as $profesi)     
                                <option value="{{ $profesi->id }}" {{ $profesi->id == $respon->jenis_profesi_id ? 'selected' : '' }}>{{ $profesi->nama_profesi}}</option>
                                @endforeach
                            </select>
                            @error('jenis_profesi_id')
                                    <div class="invalid-feedback" style="display:block;">
                                    {{ $message }}
                                    </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->

@endsection