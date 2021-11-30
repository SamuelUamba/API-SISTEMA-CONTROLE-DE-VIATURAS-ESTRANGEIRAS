<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Regiao;

class Instancia extends Model
{
    use HasFactory;
    public $table = "instancia";

    function getRegiao()
    {
        return $this->belongsTo(Regiao::class, 'regiao_id');
    }
}
