<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGradeIdForeginToTblCatRegulars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_cat_regulars', function (Blueprint $table) {
            $table->foreign('varietas_id')
                  ->references('id')
                  ->on('tbl_fishs')
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
        Schema::table('tbl_cat_regulars', function (Blueprint $table) {
            $table->dropForeign('tbl_cat_regulars_varietas_id_foreign');
        });
    }
}
