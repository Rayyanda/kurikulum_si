<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpmkTable extends Migration
{
    public function up()
    {
        Schema::create('cpmk', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->text('description');
            $table->unsignedBigInteger('cpl_id');
            $table->unsignedBigInteger('mk_id');
            $table->foreign('cpl_id')->references('id')->on('cpl')->onDelete('cascade');
            $table->foreign('mk_id')->references('id')->on('mk')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cpmk');
    }
}
