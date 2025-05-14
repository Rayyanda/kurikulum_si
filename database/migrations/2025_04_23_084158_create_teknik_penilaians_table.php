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
        Schema::create('teknik_penilaians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cpmk_id')->constrained('cpmk','id');
            $table->string('tahap_penilaian');
            $table->json('instrumen');
            $table->string('kriteria');
            $table->integer('bobot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teknik_penilaians');
    }
};
