<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrxAduanRespon;
use Yajra\DataTables\Facades\DataTables;

class TrxAduanResponController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Trx Aduan Respon';
        $table_id = 't_help_aduan_respon';
        return view('pages.admin.trx_aduan_respon.grid',compact('subtitle','table_id','icon'));
    }

    public function grid(Request $request){
        $data = TrxAduanRespon::with('pengadu')->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('pengadu_id', function($data){
                    if(isset($data->pengadu)){
                        return $data->pengadu->nama;
                    }
                    return '';
                })
                ->addColumn('pegawai_id', function($data){
                    if(isset($data->pegawai)){
                        return $data->pegawai->nama;
                    }
                    return '';
                })
                ->addColumn('respon', function($data){

                    //words ="";
                    return "<span class='badge badge-primary mt-1' >" . str_word_count(strip_tags($data->respon)) . " Words</span> ";
                })
                ->addColumn('aksi', function($data){
                     $aksi = "";
                    // $aksi .= "<a title='Edit Data' href='/admin/trx_aduan_respon/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    // $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi', 'respon'])
                ->make(true);
    
    }
    
    
}
