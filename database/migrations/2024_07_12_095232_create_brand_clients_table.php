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
            
            $table->unsignedBigInteger('pic_ntv_id')->nullable(); // Foreign key to users table
            $table->foreign('pic_ntv_id')->references('id')->on('users')->onDelete('set null');

            $table->string('jenis_industri');
            $table->string('nama_brand');
            $table->string('pic_brand_nama');
            $table->string('pic_brand_jabatan');
            $table->string('pic_brand_telepon');
            $table->decimal('proyeksi_revenue', 20, 0);
            $table->decimal('realisasi_revenue', 20, 0);
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
        Schema::table('brand_clients', function (Blueprint $table) {
            $table->dropForeign(['pic_ntv_id']);
        });

        Schema::dropIfExists('brand_clients');
    }
};
