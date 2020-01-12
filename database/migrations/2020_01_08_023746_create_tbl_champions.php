<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblChampions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_fish_champions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_fish_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('point_id');
            $table->date('date');
            $table->time('time');
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
        Schema::dropIfExists('tbl_fish_champions');
    }
}
