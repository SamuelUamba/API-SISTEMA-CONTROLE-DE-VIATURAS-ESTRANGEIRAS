<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proprietario;
use App\Models\EquipamentoAuxiliar;
use App\Models\ControleEntrada;

class Viatura extends Model
{
    use HasFactory;
    public $table = "viatura";

    function    getContoleEntrada()
    {
        return $this->hasOne(ControleEntrada::class, 'controleEntrada_id');
    }

    function    getProprietario()
    {
        return $this->belongsTo(Proprietario::class, 'viatura_id');
    }

    function    getEquipAuxiliar()
    {
        return $this->hasMany(EquipamentoAuxiliar::class, 'viatura_id');
    }
}
