<?php

namespace App\Http\Controllers;

use App\Models\ControleEntrada;
use Illuminate\Http\Request;
use Validator;

class ControleEntradaController extends Controller
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
        return  $id ? ControleEntrada::find($id) : ControleEntrada::all();
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

            'dataEntrada' => 'required',
            'dataSaidaPrevista' => 'required',
            'dataProrogacao' => 'required',
            'dataFimProrogacao' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $controleEntrada = new ControleEntrada;
            $controleEntrada->dataEntrada = $request->dataEntrada;
            $controleEntrada->dataSaidaPrevista = $request->dataSaidaPrevista;
            $controleEntrada->dataProrogacao = $request->dataProrogacao;
            $controleEntrada->dataFimProrogacao = $request->dataFimProrogacao;
            $controleEntrada->status = $request->status;

            $controleEntrada->created_at = date('Y-m-d H:i:s');
            $save =   $controleEntrada->save();
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

            'dataEntrada' => 'required',
            'dataSaidaPrevista' => 'required',
            'dataProrogacao' => 'required',
            'dataFimProrogacao' => 'required',
            'status' => 'required',
            'id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $controleEntrada = ControleEntrada::find($request->id);
            $controleEntrada->dataEntrada = $request->dataEntrada;
            $controleEntrada->dataSaidaPrevista = $request->dataSaidaPrevista;
            $controleEntrada->dataProrogacao = $request->dataProrogacao;
            $controleEntrada->dataFimProrogacao = $request->dataFimProrogacao;
            $controleEntrada->status = $request->status;
            $controleEntrada->updated_at = date('Y-m-d H:i:s');
            $update =  $controleEntrada->save();

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
        $controleEntrada = ControleEntrada::find($id);
        $delete = $controleEntrada->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }

    public function  getViatura($controleEntrada_id)
    {
        $controleEntrada = ControleEntrada::find($controleEntrada_id);
        if ($controleEntrada == null)
            return null;
        else {
            if ($controleEntrada->getViatura == null)
                return null;
            else
                return $controleEntrada->getViatura;
        }
    }
}
