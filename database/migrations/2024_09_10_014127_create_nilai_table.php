<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rubrik_id')->constrained('rubrik_analitik')->onDelete('cascade'); // Mengasumsikan tabel 'rubrik_analitik' ada
            $table->string('kategori');
            $table->integer('skor_min');
            $table->integer('skor_max');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai');
    }
}
