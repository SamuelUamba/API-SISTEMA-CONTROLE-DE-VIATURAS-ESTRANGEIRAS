<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Instancia;
use App\Models\Proprietario;

class Regiao extends Model
{
    use HasFactory;
    public $table = "regiao";

    function getInstancia()
    {

        return $this->hasMany(Instancia::class, 'regiao_id');
    }
    function getProprietario()
    {

        return $this->hasMany(Proprietario::class, 'regiao_id');
    }
}
