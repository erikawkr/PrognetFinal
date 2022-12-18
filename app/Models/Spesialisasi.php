<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialisasi extends Model
{
    use HasFactory;
    protected $table = 'm_spesialisasi';

    public function aduan_respon(){
        return $this->hasMany(MasterRespon::class, 'spesialisai_id');
    }
    protected $fillable = [
        'kode',
        'nama',
        'create_at',
    ];
}
