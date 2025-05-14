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
        Schema::create('rubrik_rps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwalrps_id')->constrained('jadwal_rps')->onDelete('cascade');
            $table->foreignId('rubrik_sp_id')->constrained('rubrik_skala_presepsi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rubrik_rps');
    }
};
