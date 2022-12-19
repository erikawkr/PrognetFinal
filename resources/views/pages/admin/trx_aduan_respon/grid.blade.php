{{-- https://www.positronx.io/laravel-datatables-example/ --}}

@extends('layouts.app')
@section('action')

@endsection
@section('content')
<div class="nk-fmg-body-head d-none d-lg-flex">
    <div class="nk-fmg-search">
        <h4 class="card-title text-primary"><i class='{{$icon}}' data-toggle='tooltip' data-placement='bottom' title='Data {{$subtitle}}'></i>  {{strtoupper("Data ".$subtitle)}}</h4>
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
        <div class="card">
            <div class="card-body">
                @if(session()->has('gagal'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! \Session::get('gagal') !!}</li>
                    </ul>
                </div>
            
                @elseif(session()->has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>            
                @endif
                <div class="table-responsive">
                    <table id="{{$table_id}}" class="small-table table " style="width:100%">
                        <thead style="color:#526484; font-size:11px;" class="thead-light">
                            <th width="1%">No.</th>
                            <th width="10%">aduan_Id</th>
                            <th width="10%">Nama Pengadu</th>
                            <th width="10%">Nama Pegawai</th>
                            <th width="10%">Tanggal</th>
                            <th width="10%">Respon</th>
                            <th width="10%">Respon_Foto</th>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->

@endsection
@push('script')
<script>
var table;
$(document).ready(function() {
    table = $('#{{$table_id}}').DataTable({
        processing:true,
        autoWidth: true,
        ordering: true,
        serverSide: true,
        dom: '<"row justify-between g-2 "<"col-7 col-sm-4 text-left"f><"col-5 col-sm-8 text-right"<"datatable-filter"<"d-flex justify-content-end g-2" l>>>><" my-3"t><"row align-items-center"<"col-5 col-sm-12 col-md-6 text-left text-md-left"i><"col-5 col-sm-12 col-md-6 text-md-right"<"d-flex justify-content-end "p>>>',
        ajax: {
            url: '{{ route("trx_aduan_respon.grid") }}',
            type:"POST",
            data: function(params) {
                params._token = "{{ csrf_token() }}";
            }
        },
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },         
            {
                data: 'aduan_id',
                name: 'aduan_id',
                orderable: false,
                searchable: false,
                class: 'text-left'
            },
            {
                data: 'pengadu_id',
                name: 'pengadu_id',
                orderable: false,
                searchable: false,
                class: 'text-left'
            },{
                data: 'pegawai_id',
                name: 'pegawai_id',
                orderable: false,
                searchable: false,
                class: 'text-left'
            },{
                data: 'tanggal',
                name: 'tanggal',
                orderable: false,
                searchable: false,
                class: 'text-left'
            },
            {
                data: 'respon',
                name: 'respon',
                orderable: false,
                searchable: false,
                class: 'text-center'
            },
            {
                data: 'respon_foto',
                name: 'respon_foto',
                orderable: false,
                searchable: false,
                class: 'text-center'
            }

        ],
    });
    
    $('.dataTables_filter').html('<div><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><em class="ti ti-search"></em></span></div><input type="search" class="form-control form-control-sm" placeholder="Type in to Search" aria-controls="tbtariflayanan"></div></div>');
});

</script>
@endpush