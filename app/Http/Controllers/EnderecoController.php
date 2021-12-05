<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use Validator;

class EnderecoController extends Controller
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
        return  $id ? Endereco::find($id) : Endereco::all();
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

            'pais' => 'required',
            'cidade' => 'required',
            'Bairro' => 'required',
            'Avenida' => 'required',
            'proprietario_id' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $endereco = new Endereco();
            $endereco->pais = $request->pais;
            $endereco->cidade = $request->cidade;
            $endereco->Bairro = $request->Bairro;
            $endereco->Avenida = $request->Avenida;
            $endereco->proprietario_id = $request->proprietario_id;

            $endereco->created_at = date('Y-m-d H:i:s');
            $save =   $endereco->save();
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
            'pais' => 'required',
            'cidade' => 'required',
            'Bairro' => 'required',
            'Avenida' => 'required',
            'proprietario_id' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $endereco = Endereco::find($request->id);
            $endereco->pais = $request->pais;
            $endereco->cidade = $request->cidade;
            $endereco->Bairro = $request->Bairro;
            $endereco->Avenida = $request->Avenida;
            $endereco->proprietario_id = $request->proprietario_id;

            $endereco->updated_at = date('Y-m-d H:i:s');
            $update =  $endereco->save();

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
        $endereco = Endereco::find($id);
        $delete = $endereco->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }



    public function getProprietario($endereco_id)
    {

        $endereco = Endereco::find($endereco_id);
        if ($endereco == null)
            return null;
        else {
            if ($endereco->getProprietario() == null)
                return null;
            else
                return  $endereco->getProprietario();
        }
    }
}
