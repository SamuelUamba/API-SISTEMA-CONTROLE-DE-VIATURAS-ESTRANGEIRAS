<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viatura;

class ControleEntrada extends Model
{
    use HasFactory;
    public $table = "controle_entrada";

    function getViatura()
    {
        return $this->belongsTo(Viatura::class, 'controleEntrada_id');
    }
}
