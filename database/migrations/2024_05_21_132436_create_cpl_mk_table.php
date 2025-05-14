<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCplMkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpl_mk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpl_id');
            $table->unsignedBigInteger('mk_id');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('cpl_id')->references('id')->on('cpl')->onDelete('cascade');
            $table->foreign('mk_id')->references('id')->on('mk')->onDelete('cascade');

            // Tambahkan unique constraint jika diperlukan
            // $table->unique(['cpl_id', 'mk_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpl_mk');
    }
}
