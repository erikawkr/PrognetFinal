<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisAduan;
use Yajra\DataTables\Facades\DataTables;


class JenisAduanController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Master Jenis Aduan';
        $table_id = 'm_jenis_aduan';
        return view('pages.admin.master_jenis_aduan.grid',compact('subtitle','table_id','icon'));
    }

    public function grid(Request $request){
        $data = JenisAduan::all();
        $datatables = DataTables::of($data);
        return $datatables
                ->addIndexColumn()
                ->addColumn('aksi', function($data){
                    $aksi = "";
                    $aksi .= "<a title='Edit Data' href='/admin/master_jenis_aduan/".$data->id."/edit' class='btn btn-md btn-primary' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-pencil' ></i></a>";
                    $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi'])
                ->make(true);
    }
    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Jenis Aduan';
        return view('pages.admin.master_jenis_aduan.create',compact('subtitle','icon'));
    }
    public function store(Request $request){
        $validated = $request->validate([
            'jenis_aduan' => ['required',],
        ]);
        $data = $request->all();
        $jenisAdu = new JenisAduan;
        $jenisAdu->fill($data);
        $jenisAdu->save();
        return redirect()->route('master_jenis_aduan.index');
        // return $jenisAdu;
    }
    public function edit($id)
    {
        $icon = 'ni ni-dashlite';
        $subtitle = 'Update Data Master Jenis Aduan';
        $jenisAdu = JenisAduan::findOrFail($id);
        return view('pages.admin.master_jenis_aduan.edit',compact('subtitle','icon','jenisAdu'));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'jenis_aduan'=> ['required',],
        ]);
        $data = $request->all();
        $jenisAdu = JenisAduan::find($id);
        $jenisAdu->fill($data);
        $jenisAdu->save();
        return redirect()->route('master_jenis_aduan.index');
        // return $jenisAdu;
    }
    public function destroy($id)
    {
        JenisAduan::destroy($id);
        return response()->json(array('success' => '1', 'msg' => 'Data telah dihapus'));
    }
}
