<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianTable extends Migration
{
    public function up()
    {
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rps_id')->constrained('rps')->onDelete('cascade'); // Mengasumsikan tabel 'rps' ada
            $table->string('clo');
            $table->string('assessment_method');
            $table->decimal('weight', 5, 2); // Menggunakan tipe decimal untuk bobot
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
