<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilUpt extends Model
{
    use HasFactory;
    protected $table = 'profil_upt';
    protected $guarded = [];

    protected $casts = [
        'tentang_fitur' => 'array',
        'keunggulan'    => 'array',
        'layanan'       => 'array',
    ];
}
