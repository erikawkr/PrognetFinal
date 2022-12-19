<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spesialisasi;
use App\Models\JenisProfesi;

class MasterRespon extends Model
{
    use HasFactory;
    protected $table = 'm_pegawai';
    protected $fillable = [
        'kode',
        'no_induk',
        'nama',
        'spesialisasi_id',
        'jeniskelamin_id',
        'jenis_profesi_id',
    ];

    public function aduan_respon(){
        return $this->hasMany(TrxAduanRespon::class, 'pegawai_id');
    }

    public function spesialisasi(){
        return $this->belongsTo(Spesialisasi::class, 'spesialisasi_id', 'id');
    }

    public function jenis_profesi(){
        return $this->belongsTo(JenisProfesi::class, 'jenis_profesi_id', 'id');
    }


}
