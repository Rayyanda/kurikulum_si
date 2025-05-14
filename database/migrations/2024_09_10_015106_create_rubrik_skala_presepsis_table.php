<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrikSkalaPresepsisTable extends Migration
{
    public function up()
    {
        Schema::create('rubrik_skala_presepsis', function (Blueprint $table) {
            $table->id();
            $table->string('dimensi');
            $table->integer('sangat_kurang');
            $table->integer('kurang');
            $table->integer('cukup');
            $table->integer('baik');
            $table->integer('sangat_baik');
            // Jika Anda tidak memerlukan timestamps, hapus baris berikut
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubrik_skala_presepsis');
    }
}
