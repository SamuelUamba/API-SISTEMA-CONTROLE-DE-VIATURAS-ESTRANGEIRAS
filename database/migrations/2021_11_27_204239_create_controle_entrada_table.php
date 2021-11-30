<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControleEntradaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('controle_entrada', function (Blueprint $table) {
            $table->id();
            $table->date("dataEntrada");
            $table->date("dataSaidaPrevista");
            $table->date("dataProrogacao");
            $table->date("dataFimProrogacao");
            $table->string("status");

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
        Schema::dropIfExists('controle_entrada');
    }
}
