<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->string('merk_barang');
            $table->year('tahun_perolehan')->nullable();
            $table->enum('sumber_dana', ['BOS', 'DAK', 'Hibah']);
            $table->decimal('harga_perolehan', 15, 2)->nullable();
            $table->string('cv_pengadaan')->nullable();
            $table->integer('jumlah_barang');
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade');
            $table->string('kondisi_barang')->nullable();
            $table->string('kepemilikan_barang');
            $table->string('penanggung_jawab')->nullable();
            $table->text('qr_code')->nullable();
            $table->text('gambar_barang')->nullable();
            $table->timestamps();
        });
        Schema::create('riwayat_mutasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('data_inventaris_id')->constrained('data_inventaris')->onDelete('cascade');
            $table->string('asal_mutasi');
            $table->string('tujuan_mutasi');
            $table->string('keterangan_mutasi');
            $table->enum('status_mutasi', ['diterima', 'ditolak', 'proses'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_inventaris');
    }
};

