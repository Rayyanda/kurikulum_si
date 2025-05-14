<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCplBkMkTable extends Migration
{
    public function up()
    {
        Schema::create('cpl_bk_mk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpl_id');
            $table->unsignedBigInteger('bk_id');
            $table->unsignedBigInteger('mk_id');
            $table->timestamps();

            $table->foreign('cpl_id')->references('id')->on('cpl')->onDelete('cascade');
            $table->foreign('bk_id')->references('id')->on('bk')->onDelete('cascade');
            $table->foreign('mk_id')->references('id')->on('mk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cpl_bk_mk');
    }
}
