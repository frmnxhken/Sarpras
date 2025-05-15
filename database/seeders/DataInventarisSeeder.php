<?php

namespace Database\Seeders;
use App\Models\DataInventaris;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataInventarisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataInventaris::create([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Kursi',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'DIY',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 150000.00,
            'cv_pengadaan' => 'CV. Maju Jaya',
            'jumlah_barang' => 10,
            'ruangan_id' => 1, // pastikan ruangan_id ini sesuai data dari Ruangans seeder
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Budi',
            'gambar_barang' => null
        ]);

        DataInventaris::create([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Meja',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Jepara',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 250000.00,
            'cv_pengadaan' => 'CV. Edukasi Mandiri',
            'jumlah_barang' => 5,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Sari',
            'gambar_barang' => null
        ]);
    }
}
