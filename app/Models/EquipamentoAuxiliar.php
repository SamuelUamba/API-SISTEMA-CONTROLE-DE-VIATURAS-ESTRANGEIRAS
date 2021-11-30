<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Viatura;

class EquipamentoAuxiliar extends Model
{
    public $table = "equipament_auxiliaro";

    function getViatura()
    {
        return $this->belongsTo(Viatura::class, 'viatura_id');
    }
}
