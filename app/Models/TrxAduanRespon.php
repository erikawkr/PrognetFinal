<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxAduanRespon extends Model
{
    use HasFactory;

    protected $table = 't_help_aduan_respon';
    protected $fillable = [
        'aduan_id',
        'pengadu_id',
        'pegawai_id',
        'tanggal',
        'respon',
        'respon_foto',
    ];
    
    public function aduan(){
        return $this->belongsTo(MasterPengadu::class, 'aduan_id', 'id');
    }

    public function pengadu(){
        return $this->belongsTo(MasterPengadu::class, 'pengadu_id', 'id');
    }

    public function pegawai(){
        return $this->belongsTo(JenisAduan::class, 'pegawai_id', 'id');
    }
}
