<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOmkTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('omk_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('semester')->unsigned();
            $table->integer('sks')->unsigned();
            $table->integer('jumlah_mk')->unsigned();
            $table->text('mk_wajib')->nullable();
            $table->text('mk_pilihan')->nullable();
            $table->text('mk_wajib_umum')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('omk_transactions');
    }
}

