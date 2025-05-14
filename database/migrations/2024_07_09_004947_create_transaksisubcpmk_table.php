<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiSubCPMKTable extends Migration
{
    public function up()
    {
        Schema::create('transaksi_subcpmk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mk_id')->constrained('mk');
            $table->foreignId('cpmk_id')->constrained('cpmk');
            $table->foreignId('subcpmk_id')->constrained('sub_cpmk');
            $table->decimal('bobot', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi_subcpmk');
    }
}
