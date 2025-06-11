<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'mata_pelajaran',
        'deskripsi',
        'foto'
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}

