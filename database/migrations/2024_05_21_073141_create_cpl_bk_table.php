<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCplBkTable extends Migration
{
    public function up()
    {
        Schema::create('cpl_bk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cpl_id');
            $table->unsignedBigInteger('bk_id');
            $table->foreign('cpl_id')->references('id')->on('cpls')->onDelete('cascade');
            $table->foreign('bk_id')->references('id')->on('bks')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cpl_bk');
    }
}
