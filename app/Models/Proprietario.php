<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LocalEmissaoCarta;
use App\Models\Viatura;
use App\Models\Nacionalidade;
use App\Models\Regiao;
use App\Models\Endereco;

class Proprietario extends Model
{
    use HasFactory;
    public $table = "proprietario";

    function getViatura()
    {
        return $this->hasOne(Viatura::class, 'controleEntrada_id');
    }

    function getLocalEmissao()
    {
        return $this->belongsTo(LocalEmissaoCarta::class, 'local_emissao_carta_id');
    }

    function getNacionalidade()
    {
        return $this->belongsTo(Nacionalidade::class, 'nacionalidade_proprietario_id');
    }

    function getRegiao()
    {
        return $this->belongsTo(Regiao::class, 'regiao_id');
    }

    function getEndereco()
    {
        return $this->hasMany(Endereco::class,  'proprietario_id');
    }
}
