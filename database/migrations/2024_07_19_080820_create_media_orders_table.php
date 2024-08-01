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
        Schema::create('media_orders', function (Blueprint $table) {
            $table->id();

            $table->string('klien');
            $table->string('nomor_paket');
            $table->date('tanggal_paket');
            $table->string('nominal_paket');
            $table->string('jenis_paket');
            $table->integer('user_team');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_orders');
    }
};
