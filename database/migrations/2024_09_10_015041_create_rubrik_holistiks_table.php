<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRubrikHolistiksTable extends Migration
{
    public function up()
    {
        Schema::create('rubrik_holistiks', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->json('kriteria'); // Menggunakan tipe JSON untuk array kriteria
            // Jika Anda tidak memerlukan timestamps, hapus baris berikut
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rubrik_holistiks');
    }
}
