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
            $table->decimal('nominal_paket', 20, 0);
            $table->string('jenis_paket');
            $table->enum('status_paket', ['ongoing','deal','nodeal'])->default('ongoing');
            $table->integer('user_team');

            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to users table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('media_orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('media_orders');
    }
};
