<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAduan extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_aduan';

    public function aduan_respon(){
        return $this->hasMany(TrxAduan::class, 'jenis_aduan_id');
    }
}
