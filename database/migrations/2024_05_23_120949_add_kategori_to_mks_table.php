<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriToMksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mks', function (Blueprint $table) {
            $table->string('kategori')->nullable()->after('semester'); // Menambah kolom kategori
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mks', function (Blueprint $table) {
            $table->dropColumn('kategori'); // Jika perlu, tambahkan kode untuk menghapus kolom
        });
    }
}
