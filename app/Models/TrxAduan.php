<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
