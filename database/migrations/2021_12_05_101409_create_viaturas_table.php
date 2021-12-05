<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaturas', function (Blueprint $table) {
            $table->id();
            $table->string("nrMatricula");
            $table->string("marca");
            $table->string("modelo");
            $table->string("tipo");
            $table->string("nrMotor");
            $table->string("nrChassi");
            $table->string("cor");
            $table->integer("nrLugares");
            $table->double('custoEstimadoViatura');
            $table->integer('controleEntrada_id');
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
        Schema::dropIfExists('viaturas');
    }
}
