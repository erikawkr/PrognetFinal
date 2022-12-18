<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProfesi extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_profesi';

    public function aduan_respon(){
        return $this->hasMany(MasterRespon::class, 'jenis_profesi_id');
    }
    protected $fillable = [
        'kode',
        'nama',
        'create_at',
    ];
}


