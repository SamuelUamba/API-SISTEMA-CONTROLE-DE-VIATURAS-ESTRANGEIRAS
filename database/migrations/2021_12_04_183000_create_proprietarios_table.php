<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietarios', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("tempoPermanencia");
            $table->string("objectivo");
            $table->string("nrCarta");
            $table->integer("viatura_id");
            $table->integer("local_emissao_carta_id");
            $table->integer("nacionalidade_proprietario_id");
            $table->integer("regiao_id");
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
        Schema::dropIfExists('proprietarios');
    }
}
