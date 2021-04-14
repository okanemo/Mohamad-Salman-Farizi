<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Wds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->float('amount_rupiah_wd');
            $table->float('nilai_unit_hasil_topup');
            $table->timestamps();

            // $table->foreignId('user_id')->references('id')->on('users');
            // $table->foreignId('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('nilai_unit_hasil_topup', 'nilai_unit_hasil_wd');
        Schema::dropIfExists('wds');
        
    }
}
