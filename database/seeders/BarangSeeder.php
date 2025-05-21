<?php

namespace Database\Seeders;
use App\Models\Barang;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Kursi',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'DIY',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 150000.00,
            'cv_pengadaan' => 'CV. Maju Jaya',
            'jumlah_barang' => 10,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Budi',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
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
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG003',
            'nama_barang' => 'Papan Tulis',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Papan Klasik',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 100000.00,
            'cv_pengadaan' => 'CV. Tulis Maju',
            'jumlah_barang' => 8,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Joko',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG004',
            'nama_barang' => 'Proyektor',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Epson',
            'tahun_perolehan' => 2022,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 3500000.00,
            'cv_pengadaan' => 'CV. Tekno',
            'jumlah_barang' => 2,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Rina',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG005',
            'nama_barang' => 'Komputer',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Dell',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 8000000.00,
            'cv_pengadaan' => 'CV. Teknologi Mandiri',
            'jumlah_barang' => 4,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Arif',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG006',
            'nama_barang' => 'Laptop',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'HP',
            'tahun_perolehan' => 2023,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 10000000.00,
            'cv_pengadaan' => 'CV. Edukasi Canggih',
            'jumlah_barang' => 3,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Mira',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG007',
            'nama_barang' => 'TV',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Samsung',
            'tahun_perolehan' => 2022,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 5000000.00,
            'cv_pengadaan' => 'CV. Vision',
            'jumlah_barang' => 1,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Edo',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG008',
            'nama_barang' => 'AC',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Panasonic',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 4500000.00,
            'cv_pengadaan' => 'CV. Sejuk',
            'jumlah_barang' => 2,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Tuti',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG009',
            'nama_barang' => 'Kipas Angin',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Mitsubishi',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 1200000.00,
            'cv_pengadaan' => 'CV. Angin Sejuk',
            'jumlah_barang' => 5,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Rudi',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG010',
            'nama_barang' => 'Printer',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Canon',
            'tahun_perolehan' => 2022,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 3000000.00,
            'cv_pengadaan' => 'CV. Print Lestari',
            'jumlah_barang' => 2,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Fani',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG011',
            'nama_barang' => 'Meja Papan',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Klasik',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 200000.00,
            'cv_pengadaan' => 'CV. Maju Terus',
            'jumlah_barang' => 15,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Dani',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG012',
            'nama_barang' => 'Rak Buku',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Custom',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 1200000.00,
            'cv_pengadaan' => 'CV. Buku Laris',
            'jumlah_barang' => 6,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Ita',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG013',
            'nama_barang' => 'Kulkas',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'LG',
            'tahun_perolehan' => 2023,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 6000000.00,
            'cv_pengadaan' => 'CV. Sejuk',
            'jumlah_barang' => 1,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Anton',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG014',
            'nama_barang' => 'Meja Belajar',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Jepara',
            'tahun_perolehan' => 2022,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 300000.00,
            'cv_pengadaan' => 'CV. Rumah Mebel',
            'jumlah_barang' => 7,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Umi',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG015',
            'nama_barang' => 'AC',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Sharp',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 4500000.00,
            'cv_pengadaan' => 'CV. Sejuk Selalu',
            'jumlah_barang' => 2,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Agus',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG016',
            'nama_barang' => 'Televisi',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'Sony',
            'tahun_perolehan' => 2023,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 7000000.00,
            'cv_pengadaan' => 'CV. View',
            'jumlah_barang' => 1,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Sinta',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG017',
            'nama_barang' => 'Whiteboard',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Klasik',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 150000.00,
            'cv_pengadaan' => 'CV. Maju',
            'jumlah_barang' => 6,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Andi',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG018',
            'nama_barang' => 'Sound System',
            'jenis_barang' => 'Elektronik',
            'merk_barang' => 'JBL',
            'tahun_perolehan' => 2020,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 4500000.00,
            'cv_pengadaan' => 'CV. Audio',
            'jumlah_barang' => 1,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Eka',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG019',
            'nama_barang' => 'Meja Kantor',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Mebel',
            'tahun_perolehan' => 2021,
            'sumber_dana' => 'BOS',
            'harga_perolehan' => 200000.00,
            'cv_pengadaan' => 'CV. Mebel Sejahtera',
            'jumlah_barang' => 4,
            'ruangan_id' => 1,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Pak Dino',
            'gambar_barang' => 'uploads/inventaris/img-5.jpg'
        ]);

        Barang::create([
            'kode_barang' => 'BRG020',
            'nama_barang' => 'Kursi Kantor',
            'jenis_barang' => 'Perabot',
            'merk_barang' => 'Eropa',
            'tahun_perolehan' => 2022,
            'sumber_dana' => 'DAK',
            'harga_perolehan' => 1000000.00,
            'cv_pengadaan' => 'CV. Meubel',
            'jumlah_barang' => 3,
            'ruangan_id' => 2,
            'kondisi_barang' => 'Baik',
            'kepemilikan_barang' => 'Milik Sekolah',
            'penanggung_jawab' => 'Bu Lita',
            'gambar_barang' => 'uploads/inventaris/sister.jpg'
        ]);
    }
}
