<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Praja extends Model
{
    use HasFactory;
    protected $table = 'praja_baru';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'jk',
        'nik_praja',
        'tmpt_lahir',
        'tgl_lahir',
        'agama',
    ];
}
