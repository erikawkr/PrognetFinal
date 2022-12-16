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
        $data = TrxAduanRespon::all();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/admin/trx_aduan_respon/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }
}
