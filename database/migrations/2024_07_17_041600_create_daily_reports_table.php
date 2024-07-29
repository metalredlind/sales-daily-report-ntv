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
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();

            $table->date('waktu');
            $table->string('tim_bertugas');
            $table->string('nama_brand');
            $table->string('nama_brand_klien')->nullable();
            $table->string('lokasi_pertemuan')->nullable();
            $table->string('nama_klien')->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('jenis_kegiatan');
            $table->string('follow_up');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_reports');
    }
};
