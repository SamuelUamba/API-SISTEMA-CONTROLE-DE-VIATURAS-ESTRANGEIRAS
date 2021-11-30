<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProprietarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proprietario', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("tempoPermanencia");
            $table->string("objectivo");
            $table->string("nrCarta");


            // chave estrangeira de ligacao com viatura..........
            $table->foreignId('viatura_id')
                ->constrained('viatura')->onUpdate('cascade')->onDelete('cascade');

            // chave estrangeira de ligacao com local de emissao da carta..........
            $table->foreignId('local_emissao_carta_id')
                ->constrained('local_emissao_carta')->onUpdate('cascade')->onDelete('cascade');

            // chave estrangeira de ligacao com nacionalidade..........
            $table->foreignId('nacionalidade_proprietario_id')
                ->constrained('nacionalidade_proprietario')->onUpdate('cascade')->onDelete('cascade');

            // chave estrangeira de ligacao com regiao..........
            $table->foreignId('regiao_id')
                ->constrained('regiao')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('proprietario');
    }
}
