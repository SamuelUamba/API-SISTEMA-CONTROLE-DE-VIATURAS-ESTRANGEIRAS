<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoProprietarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_proprietario', function (Blueprint $table) {
            $table->id();
            $table->string("pais");
            $table->string("cidade");
            $table->string("Bairro");
            $table->string("Avenida");
            // chave estrangeira de ligacao com proprietario..........
            $table->foreignId('proprietario_id')
                ->constrained('proprietario')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('endereco_proprietario');
    }
}
