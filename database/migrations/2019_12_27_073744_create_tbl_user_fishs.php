<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblUserFishs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_fishs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bio_id');
            $table->unsignedBigInteger('fish_id');
            $table->unsignedBigInteger('cat_id');
            $table->text('fish_picture');
            $table->enum('status', ['LUNAS', 'BELUM LUNAS'])->default('BELUM LUNAS');
            $table->string('confirm_by')->default('');
            $table->date('date_reg');
            $table->time('time_reg');
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
        Schema::dropIfExists('tbl_user_fishs');
    }
}
