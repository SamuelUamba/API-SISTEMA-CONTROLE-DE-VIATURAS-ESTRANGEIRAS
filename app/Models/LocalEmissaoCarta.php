<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proprietario;


class LocalEmissaoCarta extends Model
{
    use HasFactory;
    public $table = "local_emissao_carta";

    function getProprietario()
    {
        return $this->hasMany(Proprietario::class,  'local_emissao_carta_id');
    }
}
