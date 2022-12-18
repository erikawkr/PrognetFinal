<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisAduan;

class TrxAduan extends Model
{
    use HasFactory;
    protected $table = 't_help_aduan';
    protected $fillable = [
        'pengadu_id',
        'jenis_aduan_id',
        'tanggal',
        'aduan',
        'status_close'
    ];

    public function pengadu(){
        return $this->belongsTo(MasterPengadu::class, 'pengadu_id', 'id');
    }

    public function jenis_aduan(){
        return $this->belongsTo(JenisAduan::class, 'jenis_aduan_id', 'id');
    }

    public function aduan_respon(){
        return $this->hasMany(TrxAduanRespon::class, 'aduan_id');
    }
}
