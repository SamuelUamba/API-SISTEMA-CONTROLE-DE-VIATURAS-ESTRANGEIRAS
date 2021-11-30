<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proprietario;

class Endereco extends Model
{
    public $table = "equipament_auxiliaro";

    function getProprietario()
    {
        return $this->belongsTo(Proprietario::class, 'proprietario_id');
    }
}
