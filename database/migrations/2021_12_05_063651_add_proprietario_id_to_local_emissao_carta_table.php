<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProprietarioIdToLocalEmissaoCartaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('local_emissao_carta', function (Blueprint $table) {
            $table->integer("proprietario_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('local_emissao_carta', function (Blueprint $table) {
            $table->integer("proprietario_id");
        });
    }
}
