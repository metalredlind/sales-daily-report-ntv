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
        Schema::create('brand_clients', function (Blueprint $table) {
            $table->id();
            
            $table->string('pic_ntv');
            $table->string('jenis_industri');
            $table->string('nama_brand');
            $table->string('pic_brand_nama');
            $table->string('pic_brand_jabatan');
            $table->string('pic_brand_telepon');
            $table->string('proyeksi_revenue');
            $table->text('keterangan')->nullable();
            $table->integer('user_team');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_clients');
    }
};
