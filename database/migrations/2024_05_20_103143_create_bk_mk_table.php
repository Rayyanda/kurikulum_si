<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBkMkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_mk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bk_id');
            $table->unsignedBigInteger('mk_id');
            // Tambahkan kolom-kolom lain sesuai kebutuhan
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('bk_id')->references('id')->on('bk'); // Sesuaikan dengan nama tabel BK Anda
            $table->foreign('mk_id')->references('id')->on('mk'); // Sesuaikan dengan nama tabel MK Anda
            // Tambahkan foreign key lain jika diperlukan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bk_mk');
    }
}
