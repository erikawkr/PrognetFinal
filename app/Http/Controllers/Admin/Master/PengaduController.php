<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterPengadu;
use Yajra\DataTables\Facades\DataTables;


class PengaduController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Master Pengadu';
        return view('pages.admin.master_pengadu.grid',compact('subtitle','icon'));
    }

    public function grid(Request $request){
        $data = MasterPengadu::all();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/admin/master_pengaduan/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                   // $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                   return $aksi;
    })
                ->rawColumns(['aksi'])
                ->make(true);
    }
    public function edit($id)
    {
        $icon = 'ni ni-dashlite';
        $subtitle = 'Update Data Master Pengadu';
        $pengadu = MasterPengadu::findOrFail($id);
        return view('pages.admin.master_pengaduan.edit',compact('subtitle','icon','pengadu'));
    }
}
