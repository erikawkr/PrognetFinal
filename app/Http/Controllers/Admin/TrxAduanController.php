<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrxAduan;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class TrxAduanController extends Controller
{
    //

    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Trx Aduan';
        $table_id = 't_help_aduan';
        return view('pages.admin.trx_aduan.grid',compact('subtitle','table_id','icon'));
    }

    public function grid(Request $request){
        $data = TrxAduan::with('jenis_aduan')->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('pengadu_id', function($data){
                    return $data->pengadu->nama;
                })
                ->addColumn('status_close', function($data){
                    if($data->status_close == 0){
                        return "Aktif";
                    }else{
                        return "Non-Aktif";
                    }
                })
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/admin/trx_aduan/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Aduan';
        return view('pages.user.aduan.create',compact('subtitle','icon'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'pengadu_id'=> ['required',],
            'jenis_aduan_id'=> ['required',],
            'aduan' => ['required',],
            'aduan_foto' => ['required',],
        ]);
        $data = $request->all();
        $TrxAduan = new TrxAduan;
        $TrxAduan->fill($data);
        $TrxAduan->save();
        return redirect()->back();
        //return $request;
    }


    public function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }

}
