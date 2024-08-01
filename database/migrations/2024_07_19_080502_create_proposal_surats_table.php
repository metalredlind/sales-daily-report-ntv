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
        Schema::create('proposal_surats', function (Blueprint $table) {
            $table->id();

            $table->date('tanggal');
            $table->string('no_surat');
            $table->string('tujuan_surat');
            $table->string('perihal');
            $table->boolean('status_follow_up');
            $table->integer('user_team');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_surats');
    }
};
