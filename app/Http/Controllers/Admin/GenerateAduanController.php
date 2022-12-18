<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterPengadu;
use Yajra\DataTables\Facades\DataTables;

class GenerateAduanController extends Controller
{
    //
    public function create(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Tambah Data Generate Aduan';
        return view('pages.user.generate_aduan.create',compact('subtitle','icon'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => ['required',],
            'telepon' => ['required',],
            'email' => ['required',],
            'alamat' => ['required',],
        ]);
        $data = $request->all();
        $pengadu = new MasterPengadu;
        $pengadu->fill($data);
        $pengadu->save();
        // MasterPengadu::create($data);
        return redirect()->back()->with('success', 'Nomor Aduan Anda adalah ' . $pengadu->id);
        //return $request;
    }

   
}
