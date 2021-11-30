<?php

namespace App\Http\Controllers;

use App\Models\Proprietario;
use Illuminate\Http\Request;
use Validator;

class ProprietarioController extends Controller
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
        return  $id ? Proprietario::find($id) : Proprietario::all();
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
            'tempoPermanencia' => 'required',
            'objectivo' => 'required',
            'nrCarta' => 'required',
            'regiao_id' => 'required            ',
            'local_emissao_carta_id' => 'required',
            'nacionalidade_proprietario_id' => 'required',
            'viatura_id' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $proprietario = new Proprietario;
            $proprietario->nome = $request->nome;
            $proprietario->tempoPermanencia = $request->tempoPermanencia;
            $proprietario->objectivo = $request->objectivo;
            $proprietario->nrCarta = $request->nrCarta;

            $proprietario->viatura_id = $request->viatura_id;
            $proprietario->nacionalidade_proprietario_id = $request->nacionalidade_proprietario_id;
            $proprietario->local_emissao_carta_id = $request->local_emissao_carta_id;
            $proprietario->regiao_id = $request->regiao_id;

            $proprietario->created_at = date('Y-m-d H:i:s');
            $save =   $proprietario->save();
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
            'tempoPermanencia' => 'required',
            'objectivo' => 'required',
            'nrCarta' => 'required',
            'regiao_id' => 'required            ',
            'local_emissao_carta_id' => 'required',
            'nacionalidade_proprietario_id' => 'required',
            'viatura_id' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $proprietario = proprietario::find($request->id);
            $proprietario->nome = $request->nome;
            $proprietario->tempoPermanencia = $request->tempoPermanencia;
            $proprietario->objectivo = $request->objectivo;
            $proprietario->nrCarta = $request->nrCarta;

            $proprietario->viatura_id = $request->viatura_id;
            $proprietario->nacionalidade_proprietario_id = $request->nacionalidade_proprietario_id;
            $proprietario->local_emissao_carta_id = $request->local_emissao_carta_id;
            $proprietario->regiao_id = $request->regiao_id;

            $proprietario->updated_at = date('Y-m-d H:i:s');
            $update =  $proprietario->save();

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
        $proprietario = Proprietario::find($id);
        $delete = $proprietario->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }


    function getRegiao($proprietario_id)
    {
        $proprietario = proprietario::find($proprietario_id);
        if ($proprietario == null)
            return null;
        else {
            if ($proprietario->getRegiao() == null)
                return null;
            else
                return  $proprietario->getRegiao();
        }
    }

    function getViatura($proprietario_id)
    {
        $proprietario = proprietario::find($proprietario_id);
        if ($proprietario == null)
            return null;
        else {
            if ($proprietario->getViatura() == null)
                return null;
            else
                return  $proprietario->getViatura();
        }
    }

    function getLocalEmissao($proprietario_id)
    {
        $proprietario = proprietario::find($proprietario_id);
        if ($proprietario == null)
            return null;
        else {
            if ($proprietario->getLocalEmissao() == null)
                return null;
            else
                return  $proprietario->getLocalEmissao();
        }
    }

    function getNacionalidade($proprietario_id)
    {
        $proprietario = proprietario::find($proprietario_id);
        if ($proprietario == null)
            return null;
        else {
            if ($proprietario->getNacionalidade() == null)
                return null;
            else
                return  $proprietario->getNacionalidade();
        }
    }

    function getEndereco($proprietario_id)
    {
        $proprietario = proprietario::find($proprietario_id);
        if ($proprietario == null)
            return null;
        else {
            if ($proprietario->getEndereco()->get() == null)
                return null;
            else
                return  $proprietario->getEndereco()->get();
        }
    }
}
