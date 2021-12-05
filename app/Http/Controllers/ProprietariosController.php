<?php

namespace App\Http\Controllers;

use App\Models\Proprietarios;
use Illuminate\Http\Request;

class ProprietariosController extends Controller
{
    function store2(Request $req)
    {

        $p2 = new Proprietarios();
        $p2->nome = $req->input('nome');
        $p2->tempoPermanencia = $req->input('tempoPermanencia');
        $p2->objectivo = $req->input('objectivo');
        $p2->nrCarta = $req->input('nrCarta');
        $p2->viatura_id = $req->input('viatura_id');
        $p2->local_emissao_carta_id = $req->input('local_emissao_carta_id');
        $p2->nacionalidade_proprietario_id = $req->input('nacionalidade_proprietario_id');
        $p2->regiao_id = $req->input('regiao_id');
        $p2->save();
        return $p2;
    }
    function counter(){
         return Proprietarios::count();
    }
}
