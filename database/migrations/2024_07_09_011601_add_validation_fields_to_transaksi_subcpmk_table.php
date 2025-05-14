<?php
 use Illuminate\Database\Migrations\Migration;
 use Illuminate\Database\Schema\Blueprint;
 use Illuminate\Support\Facades\Schema;
 
 class AddValidationFieldsToTransaksiSubCPMKTable extends Migration
 {
     public function up()
     {
         Schema::table('transaksi_subcpmk', function (Blueprint $table) {
             $table->string('validation_status')->nullable();
             $table->text('validation_note')->nullable();
         });
     }
 
     public function down()
     {
         Schema::table('transaksi_subcpmk', function (Blueprint $table) {
             $table->dropColumn('validation_status');
             $table->dropColumn('validation_note');
         });
     }
 }
 