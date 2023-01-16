<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterPengadu;
use App\Models\TrxAduan;
use App\Models\JenisAduan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class GenerateAduanController extends Controller
{
    //
    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Generate Aduan';
        $jenis_aduans = JenisAduan::all();
        return view('pages.user.generate_aduan.create',compact('subtitle','icon', 'jenis_aduans'));
    }

    public function after_store(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Aduan Disimpan';
        return view('pages.user.generate_aduan.alert',compact('subtitle','icon'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required|unique:m_help_pengadu',
            // 'alamat' => ['required',],
            'jenis_aduan_id'=> 'required',
            'aduan' => 'required',
            'gambar' => 'required',
        ]);
        $data = $request->all();
        $pengadu = new MasterPengadu;
        $pengadu->fill($data);
        $pengadu->save();

        // create aduan
        $id = IdGenerator::generate(['table' => 't_help_aduan', 'length' => 12, 'prefix' =>date('ymd')]);
        $fileName = $request->gambar->getClientOriginalName();
        $file = $request->file('gambar');
        Storage::disk('asset')->put('asset/aduan/'.$fileName, file_get_contents($file));
        $data = $request->all();
        $TrxAduan = new TrxAduan;
        $TrxAduan->id = $id;
        $TrxAduan->pengadu_id=$pengadu->id;
        $TrxAduan->fill($data);
        $TrxAduan->tanggal=now();
        $TrxAduan->aduan_foto = $request->gambar->getClientOriginalName();
        $TrxAduan->save();
        // MasterPengadu::create($data);
        $message = 'Terimakasih aduan Anda sudah dikirim dengan nomor aduan adalah ' . $id ;
        return redirect()->route('trx_generate.alert')->with(compact('message'));
        //return $request;
    }

   
}
