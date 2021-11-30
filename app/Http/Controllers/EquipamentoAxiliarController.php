<?php

namespace App\Http\Controllers;

use App\Models\EquipamentoAuxiliar;
use Illuminate\Http\Request;
use Validator;

class EquipamentoAxiliarController extends Controller
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
        return  $id ? EquipamentoAuxiliar::find($id) : EquipamentoAuxiliar::all();
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

            'descricao' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'nrIdentificacao' => 'required',
            'custoEstimadoViatura' => 'required',
            'viatura_id ' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $equipamentoAxiliar = new EquipamentoAuxiliar();
            $equipamentoAxiliar->descricao = $request->descricao;
            $equipamentoAxiliar->marca = $request->marca;
            $equipamentoAxiliar->modelo = $request->modelo;
            $equipamentoAxiliar->nrIdentificacao = $request->nrIdentificacao;
            $equipamentoAxiliar->custoEstimadoViatura = $request->custoEstimadoViatura;
            $equipamentoAxiliar->viatura_id = $request->viatura_id;

            $equipamentoAxiliar->created_at = date('Y-m-d H:i:s');
            $save =   $equipamentoAxiliar->save();
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
        $validator = Validator::make($request->all(), [

            'descricao' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'nrIdentificacao' => 'required',
            'custoEstimadoViatura' => 'required',
            'viatura_id ' => 'required',
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $equipamentoAxiliar = EquipamentoAuxiliar::find($request->id);
            $equipamentoAxiliar->descricao = $request->descricao;
            $equipamentoAxiliar->marca = $request->marca;
            $equipamentoAxiliar->modelo = $request->modelo;
            $equipamentoAxiliar->nrIdentificacao = $request->nrIdentificacao;
            $equipamentoAxiliar->custoEstimadoViatura = $request->custoEstimadoViatura;
            $equipamentoAxiliar->viatura_id = $request->viatura_id;
            $equipamentoAxiliar->updated_at = date('Y-m-d H:i:s');
            $update =  $equipamentoAxiliar->save();

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
        $equipamentoAxiliar = EquipamentoAuxiliar::find($id);
        $delete = $equipamentoAxiliar->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }

    public function  getViatura($equipamentoAxiliar_id)
    {
        $equipamentoAxiliar = EquipamentoAuxiliar::find($equipamentoAxiliar_id);
        if ($equipamentoAxiliar == null)
            return null;
        else {
            if ($equipamentoAxiliar->getViatura == null)
                return null;
            else
                return $equipamentoAxiliar->getViatura;
        }
    }
}
