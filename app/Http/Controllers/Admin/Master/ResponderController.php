<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\Spesialisasi;
use App\Models\JenisProfesi;
use Illuminate\Http\Request;
use App\Models\MasterRespon;
use Yajra\DataTables\Facades\DataTables;


class ResponderController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Master Respon';
        $table_id = 'm_pegawai';
        return view('pages.admin.master_respon.grid',compact('subtitle','table_id','icon'));
    }

    public function grid(Request $request){
        $data = MasterRespon::with('spesialisasi')->get();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('spesialisasi_id', function($data){
                    if(isset($data->spesialisasi)){
                        return $data->spesialisasi->nama;
                    }
                    return '';
                })
                 ->addColumn('jenis_profesi_id', function($data){
                    if(isset($data->jenis_profesi)){
                        return $data->jenis_profesi->nama_profesi;
                    }
                    return '';
                 })
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/admin/master_respon/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Master Respon';
        $spesialisasi = Spesialisasi::all();
        $jenis_profesi = JenisProfesi::all();
        return view('pages.admin.master_respon.create',compact('subtitle','icon','spesialisasi','jenis_profesi'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'kode'=> ['required',],
            'nama'=> ['required',],
            'spesialisasi_id' => ['required',],
            'jenis_profesi_id' => ['required',],
        ]);
        $data = $request->all();
        $Responer = new MasterRespon;
        $Responer->fill($data);
        $Responer->save();
        return redirect()->route('master_respon.index');
        //return $Responer;
    }

    public function edit($id)
    {
        $icon = 'ni ni-dashlite';
        $subtitle = 'Update Data Master Respon';
        $spesialisasi = Spesialisasi::all();
        $jenis_profesi = JenisProfesi::all();
        $respon = MasterRespon::findOrFail($id);
        return view('pages.admin.master_respon.edit',compact('subtitle','icon','respon','spesialisasi','jenis_profesi'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'kode'=> ['required',],
            'nama'=> ['required',],
            'spesialisasi_id' => ['required',],
            'jenis_profesi_id' => ['required',],
        ]);
        $data = $request->all();
        $Responer = MasterRespon::find($id);
        $Responer->fill($data);
        $Responer->save();
        return redirect()->route('master_respon.index');
        //return $Responer;
    }
}
