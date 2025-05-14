<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrikAnalitiksTable extends Migration
{
    public function up()
    {
        Schema::create('rubrik_analitiks', function (Blueprint $table) {
            $table->id();
            $table->string('aspek');
            $table->integer('sangat_kurang');
            $table->integer('kurang');
            $table->integer('cukup');
            $table->integer('baik');
            $table->integer('sangat_baik');
            // Jika Anda tidak memerlukan timestamps (created_at dan updated_at), hapus baris berikut
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubrik_analitiks');
    }
}
