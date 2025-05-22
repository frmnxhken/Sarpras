<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruangans;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ruangans::create([
            'kode_ruangan' => 'R001',
            'nama_ruangan' => 'Lab Komputer',
        ]);

        Ruangans::create([
            'kode_ruangan' => 'R002',
            'nama_ruangan' => 'Ruang Guru',
        ]);

        Ruangans::create([
            'kode_ruangan' => 'R003',
            'nama_ruangan' => 'Perpustakaan',
        ]);

        Ruangans::create([
            'kode_ruangan' => 'R004',
            'nama_ruangan' => 'Ruang Kelas 1A',
        ]);

        Ruangans::create([
            'kode_ruangan' => 'R005',
            'nama_ruangan' => 'Ruang Kepala Sekolah',
        ]);
    }
}
