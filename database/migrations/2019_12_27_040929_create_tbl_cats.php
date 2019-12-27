<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_cats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('min_size');
            $table->integer('max_size');
            $table->string('class');
            $table->string('grade');
            $table->integer('reg_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_cats');
    }
}
