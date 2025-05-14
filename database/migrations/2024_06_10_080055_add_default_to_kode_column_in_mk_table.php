<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDefaultToKodeColumnInMkTable extends Migration
{
    public function up()
    {
        Schema::table('mk', function (Blueprint $table) {
            $table->string('kode')->default('MK-001')->change();
        });
    }

    public function down()
    {
        Schema::table('mk', function (Blueprint $table) {
            $table->string('kode')->change();
        });
    }
}
