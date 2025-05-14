<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcpmkIdToTransaksiSubcpmkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_subcpmk', function (Blueprint $table) {
            $table->foreignId('subcpmk_id')->constrained('sub_cpmk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi_subcpmk', function (Blueprint $table) {
            $table->dropForeign(['subcpmk_id']);
            $table->dropColumn('subcpmk_id');
        });
    }
}
