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
        'alamat',
        'telepon',
        'email'
    ];
}
