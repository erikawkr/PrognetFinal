<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
