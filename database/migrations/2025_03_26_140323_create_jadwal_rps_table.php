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
        Schema::create('jadwal_rps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rps_id')->constrained('rps','id')->cascadeOnDelete();
            $table->integer('minggu_ke');
            $table->foreignId('sub_cpmk_id')->constrained('sub_cpmk','id')->cascadeOnDelete();
            $table->text('indikator');
            $table->string('bentuk_pembelajaran');
            $table->string('metode_pembelajaran');
            $table->text('materi_pembelajaran');
            $table->integer('bobot_penilaian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_rps');
    }
};
