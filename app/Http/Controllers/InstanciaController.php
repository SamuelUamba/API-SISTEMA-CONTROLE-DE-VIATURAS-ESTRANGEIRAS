<?php

namespace App\Http\Controllers;

use App\Models\Instancia;
use Illuminate\Http\Request;
use Validator;

class InstanciaController extends Controller
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
        return  $id ? Instancia::find($id) : Instancia::all();
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
            'nomeInstancia' => 'required',
            'regiao_id' => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $instancia = new Instancia;
            $instancia->nomeInstancia = $request->nomeInstancia;
            $instancia->regiao_id = $request->regiao_id;

            $instancia->created_at = date('Y-m-d H:i:s');
            $save =   $instancia->save();
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
            'nomeInstancia' => 'required',
            'regiao_id' => 'required',

            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $instancia = Instancia::find($request->id);
            $instancia->nomeInstancia = $request->nomeInstancia;
            $instancia->regiao_id = $request->regiao_id;

            $instancia->updated_at = date('Y-m-d H:i:s');
            $update =  $instancia->save();

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
        $instancia = Instancia::find($id);
        $delete = $instancia->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }


    function getRegiao($instancia_id)
    {
        $instancia = Instancia::find($instancia_id);
        if ($instancia == null)
            return null;
        else {
            if ($instancia->getRegiao() == null)
                return null;
            else
                return  $instancia->getRegiao();
        }
    }
}
