<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\Tutor;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        $tutors = Tutor::all();

        if ($tutors->count() == 0) {
            $this->command->info('Tidak ada data tutor. Jalankan seeder Tutor terlebih dahulu.');
            return;
        }

        $dataJadwal = [
            [
                'mata_pelajaran' => 'Matematika',
                'hari' => 'Senin',
                'jam_mulai' => '14:00',
                'jam_selesai' => '15:30',
                'kuota' => 5,
            ],
            [
                'mata_pelajaran' => 'Bahasa Inggris',
                'hari' => 'Selasa',
                'jam_mulai' => '13:00',
                'jam_selesai' => '14:30',
                'kuota' => 5,
            ],
            [
                'mata_pelajaran' => 'Fisika',
                'hari' => 'Rabu',
                'jam_mulai' => '10:00',
                'jam_selesai' => '11:30',
                'kuota' => 5,
            ],
        ];

        foreach ($dataJadwal as $data) {
            Jadwal::create([
                'mata_pelajaran' => $data['mata_pelajaran'],
                'hari' => $data['hari'],
                'jam_mulai' => $data['jam_mulai'],
                'jam_selesai' => $data['jam_selesai'],
                'tutor_id' => $tutors->random()->id,
                'kuota' => $data['kuota'],
                'terdaftar' => 0,
            ]);
        }

        $this->command->info('Jadwal berhasil disisipkan.');
    }
}
