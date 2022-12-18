<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAduan extends Model
{
    use HasFactory;
    protected $table = 'm_jenis_aduan';
    protected $fillable = [
        'jenis_aduan',
        'created_at',
        'updated_at',
    ];
}
