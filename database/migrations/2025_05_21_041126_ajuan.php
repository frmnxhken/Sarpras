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
        Schema::create('ajuan_pengadaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->enum('status',['pending','disetujui','ditolak'])->default('pending');
            $table->timestamps();
        });
        Schema::create('ajuan_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('peminjaman_id')->constrained('peminjaman')->onDelete('cascade');
            $table->enum('status',['pending','disetujui','ditolak'])->default('pending');
            $table->timestamps();
        });
        Schema::create('ajuan_perawatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('perawatan_id')->constrained('perawatans')->onDelete('cascade');
            $table->enum('status',['pending','disetujui','ditolak'])->default('pending');
            $table->timestamps();
        });
        // Schema::create('ajuan_penghapusan', function (Blueprint $table) {
        //     $table->id();
            // $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
