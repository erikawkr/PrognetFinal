<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrxAduan;
use App\Models\MasterRespon;
use App\Models\TrxAduanRespon;
use App\Models\JenisAduan;

class AduanResponderController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Cek Nomor Aduan';
        return view('pages.user.aduan_responder.index',compact('subtitle','icon'));
    }


    public function cek_aduan(Request $request){
        $validated = $request->validate([
            'nomor_aduan'=> ['required',],
        ]);
        $temps = TrxAduan::all();
        $cek=false;
        foreach($temps as $data){
            if($request->nomor_aduan == $data->id){
                $cek=true;
            }
        }
        if($cek==true){
            return redirect()->route('user.aduan_responder.respon', $request->nomor_aduan);
        }else{
            return redirect()->back()->with('gagal', 'Nomor Aduan Anda tidak terdeteksi di sistem! ');
        }
    }

    public function respon($id){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Trx Aduan';
        $jenis_aduans = JenisAduan::all();
        $record = TrxAduan::find($id);
        $respons=TrxAduanRespon::where('aduan_id', '=', $record->id)->get();
        $pegawais=MasterRespon::all();
        return view('pages.user.aduan_responder.respon',compact('subtitle','icon', 'jenis_aduans', 'record', 'respons', 'pegawais'));
        // return $record;

    }

    public function store($id, Request $request){

        $record = TrxAduan::find($id);
        $reply_respond = new TrxAduanRespon;
        $temp_id = time();
        $reply_respond->id = (int)$temp_id;
        $reply_respond->aduan_id = $record->id;
        $reply_respond->tanggal = now();
        $reply_respond->respon = $request->respond;
        $reply_respond->pengadu_id = $record->pengadu_id;
        $reply_respond->save();
        return redirect()->route('user.aduan_responder.respon', $id);
    }

}
