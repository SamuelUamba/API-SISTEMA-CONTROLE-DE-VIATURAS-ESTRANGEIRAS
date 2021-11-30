<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regiao;
use Validator;

class RegiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource ===> Adaptado para juntar as funcoes.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        return  $id ? Regiao::find($id) : Regiao::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $regiao = new Regiao;
            $regiao->nome = $request->nome;
            $regiao->created_at = date('Y-m-d H:i:s');
            $save =   $regiao->save();
            return $save  ? ["Resultado" => "Dados guardados com sucesso"]
                :  ["Resultado" => "Falha ao guardar dados"];
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $restricoes = [
            'nome' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $regiao = Regiao::find($request->id);
            $regiao->nome = $request->nome;
            $regiao->updated_at = date('Y-m-d H:i:s');
            $update =  $regiao->save();

            return $update ? ["Resultado" => "Dados actualizados com sucesso"]
                : ["Resultado" => "Falha ao actualizar dados "];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $regiao = Regiao::find($id);
        $delete = $regiao->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }


    public function getInstancia($regiao_id)
    {
        $regiao = Regiao::find($regiao_id);
        if ($regiao == null)
            return null;
        else {
            if ($regiao->getInstancia()->get() == null)
                return null;
            else
                return  $regiao->getInstancia()->get();
        }
    }
    public function getProprietario($regiao_id)
    {
        $regiao = Regiao::find($regiao_id);
        if ($regiao == null)
            return null;
        else {
            if ($regiao->getProprietario()->get() == null)
                return null;
            else
                return  $regiao->getProprietario()->get();
        }
    }
}
