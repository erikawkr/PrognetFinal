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
            <a href="{{ route('trx_aduan.index') }}" class="btn btn-sm btn-primary" onclick="buttondisable(this)"><em class="icon fas fa-arrow-left"></em> <span>Kembali</span></a>
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
                <form name="frm_input" id="frm_input_srt" action="{{ route('trx_aduan.store_respon', $record->id) }}" method="POST">
                    @csrf
                    <div class="form-body">
                        <div class="form-group row">
                            <div class="col-8 receiver" >
                            <textarea class="summernote-disabled" name="aduan" disabled >{{ $record->aduan }}</textarea>
                        </div>
                        <style>
                            .receiver .note-editable { background-color: rgb(119, 189, 214) !important; color: white !important; }

                        </style>
                        <label class="col-12 text-left" style="margin-bottom:0px;">{{ $record->id }}-({{ $record->pengadu->nama }})</label>
                        <label class="col-12 text-left">{{ $record->created_at }}</label>
                        <div class="col-4"></div>
                            <label class="col-12 text-left" for="exampleFormControlFile1">Aduan Foto</label>
                            <div class="col-12 text-left">
                                <a href="asset/aduan/{{ $record->aduan_foto }}" target="_blank">
                                    {{ $record->aduan_foto }}
                                    {{--  <img src="asset/aduan/{{ $record->aduan_foto }}" width='300px' height='300px'> --}}
                                </a> 
                            </div>
                            
                        </div>
                        {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                        <br>
                        <br>

                        @foreach ($respons as $item)
                        @if (isset($item->pegawai_id))
                        <div class="form-group row " >
                            <div class="col-4"></div>
                            <div class="col-8 sender" >
                                <textarea class="summernote-disabled" name="aduan" disabled >{{ $item->respon }}</textarea>
                            </div>
                            <style>
                                .sender .note-editable { background-color: rgb(207, 210, 132) !important; color: white !important; }

                            </style>
                            <label class="col-12 text-right" style="margin-bottom:0px;">{{ $item->pegawai->jenis_profesi->nama_profesi }} - ({{ $item->pegawai->nama }})</label>
                            <label class="col-12 text-right">{{ $item->created_at }}</label>
                        </div>  
                        @else
                        <div class="form-group row " >
                            <div class="col-8 receiver" >
                                <textarea class="summernote-disabled" name="aduan" disabled >{{ $item->respon }}</textarea>
                            </div>
                            <style>
                                .receiver .note-editable { background-color: rgb(119, 189, 214) !important; color: white !important; }

                            </style>
                            <div class="col-4"></div>
                            <label class="col-12 text-left" style="margin-bottom:0px;">{{ $record->id }}{{ $item->pengadu->nama }}</label>
                            <label class="col-12 text-left">{{ $item->created_at }}</label>
                        </div>  
                        @endif
                            
                        @endforeach
                        
                        
                        <br>
                        <br>
                        <div class="form-group row" >
                            {{-- <div class="col-4"></div> --}}
                            <div class="col-12 mb-2">
                                <div class="row">
                                    <div class="col-9">
                                        <select class="custom-select" name="pegawai_id" aria-label="Default select example">
                                            <option value="" selected>Select Pegawai</option>
                                            @foreach ($pegawais as $pegawai)     
                                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('pegawai_id')
                                                <div class="invalid-feedback" style="display:block;">
                                                {{ $message }}
                                                </div>
                                        @enderror
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-primary text-center" style="width:100%; text-align:center">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12" style="float:right" >
                                <textarea class="summernote" name="respond"></textarea>
                            </div>
                            {{-- <label class="col-12 text-right">Pegawai - (Pak Okas)</label> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- </div> -->

@endsection


@push('script')
<script>
    document.querySelector('#frm_input_srt').addEventListener('submit', function(e) {
    var form = this;

    e.preventDefault(); // <--- prevent form from submitting

    swal({
        title: "Apakah anda yakin ingin mengajukan aduan?",
        icon: "warning",
        buttons: [
            'Tidak, batalkan!',
            'Iya!'
        ],
        dangerMode: true,
        }).then(function(isConfirm) {
        if (isConfirm) {
            swal({
            title: 'Berhasil!',
            text: 'Aduan berhasil disimpan!',
            icon: 'success'
            }).then(function() {
            form.submit(); // <--- submit form programmatically
            });
        } else {
            swal("Batal", "error");
        }
        })
    });
</script>
@endpush