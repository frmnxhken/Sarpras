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
        Schema::create('pending_updates', function (Blueprint $table) {
            $table->id();
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
            $table->text('keterangan')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('gambar_barang')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pending_updates');
    }
};
