<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_pelajaran',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'tutor_id',
        'kuota',
        'terdaftar'
    ];

    protected $dates = [
        'jam_mulai',
        'jam_selesai'
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class)->withDefault([
            'nama' => 'Tutor Tidak Tersedia',
            'mata_pelajaran' => '-'
        ]);
    }

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class);
    }
}
