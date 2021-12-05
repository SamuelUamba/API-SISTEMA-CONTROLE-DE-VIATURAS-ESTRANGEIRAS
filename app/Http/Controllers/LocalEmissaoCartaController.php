<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocalEmissaoCarta;
use Validator;

class LocalEmissaoCartaController extends Controller
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
        return  $id ? LocalEmissaoCarta::find($id) : LocalEmissaoCarta::all();
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

            'dataEmissao' => 'required',
            'pais' => 'required',
            'cidade' => 'required',
            'proprietario_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $localEmCarta = new LocalEmissaoCarta;
            $localEmCarta->pais = $request->pais;
            $localEmCarta->dataEmissao = $request->dataEmissao;
            $localEmCarta->cidade = $request->cidade;
            $localEmCarta->proprietario_id=$request->proprietario_id;
            $localEmCarta->created_at = date('Y-m-d H:i:s');
            $save =   $localEmCarta->save();
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

            'dataEmissao' => 'required',
            'pais' => 'required',
            'cidade' => 'required',
            'id' => 'required'


        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $localEmCarta = LocalEmissaoCarta::find($request->id);
            $localEmCarta->pais = $request->pais;
            $localEmCarta->dataEmissao = $request->dataEmissao;
            $localEmCarta->cidade = $request->cidade;
            $localEmCarta->updated_at = date('Y-m-d H:i:s');
            $update =  $localEmCarta->save();

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
        $localEmCarta = LocalEmissaoCarta::find($id);
        $delete = $localEmCarta->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }

    public function getProprietario($localEmCarta_id)
    {
        $localEmCarta = LocalEmissaoCarta::find($localEmCarta_id);
        if ($localEmCarta == null)
            return null;
        else {
            if ($localEmCarta->getProprietario()->get() == null)
                return null;
            else
                return $localEmCarta->getProprietario()->get();
        }
    }
}
