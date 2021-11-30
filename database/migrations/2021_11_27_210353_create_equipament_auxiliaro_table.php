<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipamentAuxiliaroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipament_auxiliaro', function (Blueprint $table) {
            $table->id();
            $table->string("descricao");
            $table->string("marca");
            $table->string("modelo");
            $table->string("nrIdentificacao");
            $table->double('custoEstimadoViatura');
            // chave estrangeira de ligacao com proprietario..........
            $table->foreignId('viatura_id')
                ->constrained('viatura')->onUpdate('cascade')->onDelete('cascade');


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
        Schema::dropIfExists('equipament_auxiliaro');
    }
}
