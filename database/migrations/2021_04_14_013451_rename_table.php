<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wds', function(Blueprint $table) {
            $table->renameColumn('nilai_unit_hasil_topup', 'nilai_unit_hasil_wd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wds', function(Blueprint $table) {
            $table->renameColumn('nilai_unit_hasil_topup', 'nilai_unit_hasil_wd');
        });
    }
}
