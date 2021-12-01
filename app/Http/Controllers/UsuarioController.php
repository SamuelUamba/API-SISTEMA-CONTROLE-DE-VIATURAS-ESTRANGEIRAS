<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Validator;

class UsuarioController extends Controller
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
        return  $id ? Usuarios::find($id) : Usuarios::all();
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

            "nome" => 'required',
            "apelido" => 'required',
            "dataNascimento" => 'required',
            "email" => 'required',
            "contacto" => 'required',
            "tipo" => 'required',
            "password" => 'required'

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $usuario = new Usuarios();
            $usuario->nome = $request->nome;
            $usuario->apelido = $request->apelido;
            $usuario->dataNascimento = $request->dataNascimento;
            $usuario->email = $request->email;
            $usuario->contacto = $request->contacto;
            $usuario->tipo = $request->tipo;
            $usuario->password = $request->password;


            $usuario->created_at = date('Y-m-d H:i:s');
            $save =   $usuario->save();
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

            "nome" => 'required',
            "apelido" => 'required',
            "dataNascimento" => 'required',
            "email" => 'required',
            "contacto" => 'required',
            "tipo" => 'required',
            "password" => 'required',

            'id' => 'required'
        ];

        $validator = Validator::make($request->all(),  $restricoes);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {

            $usuario = Usuarios::find($request->id);
            $usuario->nome = $request->nome;
            $usuario->apelido = $request->apelido;
            $usuario->dataNascimento = $request->dataNascimento;
            $usuario->email = $request->email;
            $usuario->contacto = $request->contacto;
            $usuario->tipo = $request->tipo;
            $usuario->password = $request->password;

            $usuario->updated_at = date('Y-m-d H:i:s');
            $update =  $usuario->save();

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
        $usuario = Usuarios::find($id);
        $delete = $usuario->delete();

        return $delete ? ["Resultado" => "Dados apagados com sucesso"]
            : ["Resultado" => "Falha ao apagar dados "];
    }
}
