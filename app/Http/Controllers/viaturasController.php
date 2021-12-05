<?php

namespace App\Http\Controllers;

use App\Models\viaturas;
use Illuminate\Http\Request;

class viaturasController extends Controller
{
    function store2(Request $req)
    {
        $viatura = new viaturas();
        $viatura->nrMatricula = $req->input('nrMatricula');
        $viatura->marca = $req->input('marca');
        $viatura->modelo = $req->input('modelo');
        $viatura->tipo = $req->input('tipo');
        $viatura->nrMotor = $req->input('nrMotor');
        $viatura->nrChassi = $req->input('nrChassi');
        $viatura->cor = $req->input('cor');
        $viatura->nrLugares = $req->input('nrLugares');
        $viatura->custoEstimadoViatura = $req->input('custoEstimadoViatura');
        $viatura->controleEntrada_id = $req->input('controleEntrada_id');
       
        $save =   $viatura->save();
            return $save  ? ["Resultado" => "Dados guardados com sucesso"]
                :  ["Resultado" => "Falha ao guardar dados"];
        
    }

}
