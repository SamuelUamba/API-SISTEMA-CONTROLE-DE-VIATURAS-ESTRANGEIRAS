<?php

namespace App\Http\Controllers;

use App\Models\Nacionalidade;
use App\Models\Proprietario;
use Illuminate\Http\Request;
use Validator;


class NacionalidadeController extends Controller
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
        return  $id ? Nacionalidade::find($id) : Nacionalidade::all();
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
            'nomePais' => 'required',
            'proprietario_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $nacionalidade = new Nacionalidade;
            $nacionalidade->nomePais = $request->nomePais;
            $nacionalidade->proprietario_id=$request->proprietario_id;
            $nacionalidade->created_at = date('Y-m-d H:i:s');
            $save =   $nacionalidade->save();
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
            'nomePais' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $nacionalidade = Nacionalidade::find($request->id);
            $nacionalidade->nomePais = $request->nomePais;
            $nacionalidade->updated_at = date('Y-m-d H:i:s');
            $update =  $nacionalidade->save();

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
        $nacionalidade = Nacionalidade::find($id);
        $delete = $nacionalidade->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }

    public function getProprietario($nacionalidade_id)
    {
        $nacionalidade = Nacionalidade::find($nacionalidade_id);
        if ($nacionalidade == null)
            return null;
        else {
            if ($nacionalidade->getProprietario()->get() == null)
                return null;
            else
                return  $nacionalidade->getProprietario()->get();
        }
    }
}
