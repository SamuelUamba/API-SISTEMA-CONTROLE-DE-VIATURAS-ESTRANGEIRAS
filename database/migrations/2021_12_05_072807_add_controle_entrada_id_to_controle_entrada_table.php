<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddControleEntradaIdToControleEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('controle_entrada', function (Blueprint $table) {
            $table->integer("controleEntrada_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('controle_entrada', function (Blueprint $table) {
            $table->integer("controleEntrada_id");
        });
    }
}
