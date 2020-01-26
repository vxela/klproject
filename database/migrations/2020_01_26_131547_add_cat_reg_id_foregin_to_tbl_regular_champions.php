<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatRegIdForeginToTblRegularChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_regular_champions', function (Blueprint $table) {
            $table->foreign('cat_reg_id')
                  ->references('id')
                  ->on('tbl_cat_regulars')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_regular_champions', function (Blueprint $table) {
            $table->dropForeign('tbl_regular_champions_cat_reg_id_foreign');
        });
    }
}
