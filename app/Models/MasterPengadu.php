<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterPengadu extends Model
{
    use HasFactory;

    protected $table = 'help_pengadus';
    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email'
    ];

    public function aduan_respon(){
        return $this->hasMany(TrxAduanRespon::class, 'pengadu_id');
    }

    public function aduan(){
        return $this->hasMany(TrxAduan::class, 'pengadu_id');
    }
}
