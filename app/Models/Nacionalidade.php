<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proprietario;


class Nacionalidade extends Model
{
    use HasFactory;
    public $table = "nacionalidade_proprietario";


    function getProprietario()
    {
        return $this->hasMany(Proprietario::class, 'nacionalidade_proprietario_id');
    }
}
