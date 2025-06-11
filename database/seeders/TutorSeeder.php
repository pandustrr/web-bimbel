<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutor;

class TutorSeeder extends Seeder
{
    public function run(): void
    {
        $tutors = [
            [
                'nama' => 'Andi Saputra',
                'email' => 'andi@example.com',
                'no_hp' => '081234567890',
                'mata_pelajaran' => 'Matematika',
                'deskripsi' => 'Tutor berpengalaman dalam mengajar matematika tingkat SD dan SMP.',
                'foto' => 'andi.jpg',
            ],
            [
                'nama' => 'Rina Kartika',
                'email' => 'rina@example.com',
                'no_hp' => '085678901234',
                'mata_pelajaran' => 'Bahasa Inggris',
                'deskripsi' => 'Mengajar Bahasa Inggris dengan metode menyenangkan dan interaktif.',
                'foto' => 'rina.jpg',
            ],
            [
                'nama' => 'Budi Hartono',
                'email' => 'budi@example.com',
                'no_hp' => '082345678901',
                'mata_pelajaran' => 'IPA',
                'deskripsi' => 'Menguasai konsep IPA dasar dan menyampaikan materi dengan logis.',
                'foto' => 'budi.jpg',
            ],
        ];

        foreach ($tutors as $tutor) {
            Tutor::create($tutor);
        }
    }
}
