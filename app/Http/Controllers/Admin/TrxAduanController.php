<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisAduan;
use Illuminate\Http\Request;
use App\Models\TrxAduan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
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
                ->addColumn('aduan_foto', function($data){
                    $url = 'asset/aduan/' . $data->aduan_foto;
                    // $url = "";
                    return "<td><img src='" . $url . "' alt='" . $data->aduan_foto . "' width='100px' height='auto'></td>";
                })
                ->addColumn('aduan', function($data){

                    //words ="";
                    return "<br><span class='badge badge-primary mt-1'>" . str_word_count(strip_tags($data->aduan)) . " Words</span> ";
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
                    $aksi .= "<a title='Show Data' href='/admin/trx_aduan/".$data->id."/show' class='btn btn-md btn-success' data-toggle='tooltip' data-placement='bottom' onclick='buttonsmdisable(this)'><i class='ti-file' ></i></a>";
                    // $aksi .= "<a title='Delete Data' href='javascript:void(0)' onclick='deleteData(\"{$data->id}\",\"{$data->email}\",this)' class='btn btn-md btn-danger' data-id='{$data->id}' data-email='{$data->email}'><i class='ti-trash' data-toggle='tooltip' data-placement='bottom' ></i></a> ";
                    return $aksi;
                })
                ->rawColumns(['aksi', 'aduan_foto', 'aduan'])
                ->make(true);
    }

    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Aduan';
        $jenis_aduans = JenisAduan::all();
        return view('pages.user.aduan.create',compact('subtitle','icon', 'jenis_aduans'));
    }

    public function deleteData(Request $request){
        if(TrxAduan::destroy($request->id)){
            $response = array('success'=>1,'msg'=>'Berhasil hapus data');
        }else{
            $response = array('success'=>2,'msg'=>'Gagal menghapus data');
        }
        return $response;
    }

    public function store(Request $request){
        $validated = $request->validate([
            'pengadu_id'=> ['required',],
            'jenis_aduan_id'=> ['required',],
            'aduan' => ['required',],
            'gambar' => ['required',],
        ]);
        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/aduan/'.$fileName, file_get_contents($file));
        $data = $request->all();
        $TrxAduan = new TrxAduan;
        $TrxAduan->fill($data);
        $TrxAduan->tanggal=now();
        $TrxAduan->aduan_foto = $request->gambar->getClientOriginalName();
        $TrxAduan->save();
        return redirect()->route('trx_aduan.index');
        //return $request;
    }

    public function show($id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Trx Aduan';
        $jenis_aduans = JenisAduan::all();
        $record = TrxAduan::find($id);
        return view('pages.admin.trx_aduan.show',compact('subtitle','icon', 'jenis_aduans', 'record'));
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
