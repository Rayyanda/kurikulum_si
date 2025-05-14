<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiAkhirMkTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_akhir_mk', function (Blueprint $table) {
            $table->id(); // Menambahkan primary key 'id'
            $table->string('mk');
            $table->string('cpl');
            $table->string('cpmk');
            $table->integer('skor');
            $table->integer('total');
            
            // Menghapus timestamps karena model tidak memerlukannya
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_akhir_mk');
    }
}
