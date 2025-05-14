<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMkIdToSubCPMKTable extends Migration
{
    public function up()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->unsignedBigInteger('mk_id')->after('cpmk_id'); // Kolom mk_id ditambah setelah cpmk_id
            $table->foreign('mk_id')->references('id')->on('mks'); // Foreign key ke tabel mks
        });
    }

    public function down()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->dropForeign(['mk_id']);
            $table->dropColumn('mk_id');
        });
    }
}
