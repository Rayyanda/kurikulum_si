<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddValidationStatusToSubCpmkTable extends Migration
{
    public function up()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->enum('validation_status', ['pending', 'accepted', 'rejected', 'on_hold'])->default('pending');
            $table->text('validation_note')->nullable();
        });
    }

    public function down()
    {
        Schema::table('sub_cpmk', function (Blueprint $table) {
            $table->dropColumn('validation_status');
            $table->dropColumn('validation_note');
        });
    }
}
