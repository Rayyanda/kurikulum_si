
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyValidationStatusInSubCpmkTable extends Migration
{
    public function up()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->enum('validation_status', ['revisi', 'ubah'])->default('revisi')->change();
        });
    }

    public function down()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->enum('validation_status', ['accept', 'reject', 'hold'])->default('accept')->change();
        });
    }
}
