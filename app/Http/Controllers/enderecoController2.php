<?php

namespace App\Http\Controllers;


use App\Models\enderecos;
use Illuminate\Http\Request;

class enderecoController2 extends Controller
{
    public function store2(Request $req)
    {
        $E2 = new enderecos();
        $E2->pais = $req->input('pais');
        $E2->cidade = $req->input('cidade');
        $E2->Bairro = $req->input('Bairro');
        $E2->Avenida = $req->input('Avenida');
        $E2->proprietario_id = $req->input('proprietario_id');
        $E2->save();
        return $E2;
    }
}
