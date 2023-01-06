<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TrxAduan;
use App\Models\TrxAduanRespon;
use App\Models\MasterRespon;
use App\Models\JenisAduan;

class ReportController extends Controller
{
    //
    public function index(){
        $icon = 'ni ni-dashlite';
        $subtitle = 'Report Jenis Aduan';
        // $list = TrxAduan::groupBy('jenis_aduan_id')->pluck('jenis_aduan_id', 'countries.*.id');
        $jenis_aduans = JenisAduan::with('aduans')->limit(12)->get();
        $aduans = TrxAduan::all();
        return view('pages.report.index',compact('subtitle','icon', 'aduans', 'jenis_aduans'));
    }

}
