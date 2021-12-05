<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\viaturas;

class EquipamentoAuxiliar extends Model
{
    public $table = "equipament_auxiliaro";

     function getViatura()
    {
         return $this->belongsTo(viaturas::class, 'viatura_id');
     }
}
