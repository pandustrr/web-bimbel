<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'email',
        'no_hp',
        'kelas',
        'asal_sekolah',
        'mata_pelajaran_diminati',
        'alamat',
        'jadwal_id'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
