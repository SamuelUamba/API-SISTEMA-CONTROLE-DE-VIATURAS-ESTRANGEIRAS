<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viatura', function (Blueprint $table) {
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

            // chave estrangeira de ligacao com controle de entrada..........
            $table->foreignId('controleEntrada_id')
                ->constrained('controle_entrada')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('viatura');
    }
}
