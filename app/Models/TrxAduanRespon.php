<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxAduanRespone extends Model
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
}
