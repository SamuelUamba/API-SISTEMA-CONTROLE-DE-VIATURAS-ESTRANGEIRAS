<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;
use Validator;

class ViaturaController extends Controller
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
        return  $id ? Viatura::find($id) : Viatura::all();
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
            'nrMatricula' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'tipo' => 'required',
            'nrMotor' => 'required',
            'nrChassi' => 'required',
            'cor' => 'required',
            'nrLugares' => 'required',
            'custoEstimadoViatura' => 'required',
            'controleEntrada_id' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $viatura = new Viatura;
            $viatura->nrMatricula = $request->nrMatricula;
            $viatura->marca = $request->marca;
            $viatura->modelo = $request->modelo;
            $viatura->tipo = $request->tipo;
            $viatura->nrMotor = $request->nrMotor;
            $viatura->nrChassi = $request->nrChassi;
            $viatura->cor = $request->cor;
            $viatura->nrLugares = $request->nrLugares;
            $viatura->custoEstimadoViatura = $request->custoEstimadoViatura;
            $viatura->controleEntrada_id = $request->controleEntrada_id;

            $viatura->created_at = date('Y-m-d H:i:s');
            $save =   $viatura->save();
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
            'nrMatricula' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'tipo' => 'required',
            'nrMotor' => 'required',
            'nrChassi' => 'required',
            'cor' => 'required',
            'nrLugares' => 'required',
            'custoEstimadoViatura' => 'required',
            'controleEntrada_id' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $viatura = Viatura::find($request->id);
            $viatura->nrMatricula = $request->nrMatricula;
            $viatura->marca = $request->marca;
            $viatura->modelo = $request->modelo;
            $viatura->tipo = $request->tipo;
            $viatura->nrMotor = $request->nrMotor;
            $viatura->nrChassi = $request->nrChassi;
            $viatura->cor = $request->cor;
            $viatura->nrLugares = $request->nrLugares;
            $viatura->custoEstimadoViatura = $request->custoEstimadoViatura;
            $viatura->controleEntrada_id = $request->controleEntrada_id;


            $viatura->updated_at = date('Y-m-d H:i:s');
            $update =  $viatura->save();

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
        $viatura = Viatura::find($id);
        $delete = $viatura->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }



    public function getProprietario($viatura_id)
    {

        $viatura = Viatura::find($viatura_id);
        if ($viatura == null)
            return null;
        else {
            if ($viatura->getProprietario() == null)
                return null;
            else
                return  $viatura->getProprietario();
        }
    }


    function getContoleEntrada($viatura_id)
    {
        $viatura = Viatura::find($viatura_id);
        if ($viatura == null)
            return null;
        else {
            if ($viatura->getContoleEntrada() == null)
                return null;
            else
                return  $viatura->getContoleEntrada();
        }
    }


    function  getEquipAuxiliar($viatura_id)
    {
        $viatura = Viatura::find($viatura_id);
        if ($viatura == null)
            return null;
        else {
            if ($viatura->getEquipAuxiliar()->get() == null)
                return null;
            else
                return  $viatura->getEquipAuxiliar()->get();
        }
    }
}
