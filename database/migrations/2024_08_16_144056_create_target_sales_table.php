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
        Schema::create('target_sales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_sales_id')->nullable(); // Foreign key to users table
            $table->foreign('user_sales_id')->references('id')->on('users')->onDelete('set null');

            $table->decimal('target_sales', 20, 0);
            $table->string('month', 2); // Store month as two digits (01-12)
            $table->year('year'); // Store year

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('target_sales', function (Blueprint $table) {
            $table->dropForeign(['user_sales_id']);
        });

        Schema::dropIfExists('target_sales');
    }
};
