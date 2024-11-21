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
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');  // Bisa disesuaikan dengan sistem ID pengguna Anda
            $table->string('uid');
            $table->enum('status', ['success', 'error']);  // Status absensi
            $table->timestamp('timestamp')->useCurrent();  // Waktu absensi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};
