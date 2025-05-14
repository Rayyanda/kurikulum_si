<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBobotPenilaianTable extends Migration
{
    public function up()
    {
        Schema::create('bobot_penilaian', function (Blueprint $table) {
            $table->id(); // Menambahkan primary key 'id'
        $table->string('cpl');
            $table->string('mk');
            $table->string('cpmk');
            $table->string('mbkm')->nullable(); // nullable jika tidak selalu ada
            $table->integer('partisipasi')->nullable();
            $table->integer('observasi')->nullable();
            $table->integer('untuk_kerja')->nullable();
            $table->integer('tes_tulis_UTS')->nullable();
            $table->integer('tes_tulis_UAS')->nullable();
            $table->integer('tes_lisan_Tugas_Kelompok')->nullable();
            $table->integer('total')->nullable();

            // Menghapus timestamps karena model tidak memerlukannya
        });
    }

    public function down()
    {
        Schema::dropIfExists('bobot_penilaian');
    }
}
