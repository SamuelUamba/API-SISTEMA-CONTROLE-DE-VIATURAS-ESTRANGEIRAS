<?php

use App\Http\Controllers\ControleEntradaController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\enderecoController2;
use App\Http\Controllers\EquipamentoAxiliarController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\InstanciaController;
use App\Http\Controllers\LocalEmissaoCartaController;
use App\Http\Controllers\NacionalidadeController;
use App\Http\Controllers\ProprietariosController;
use App\Http\Controllers\ProprietarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegiaoController;
use App\Http\Controllers\ViaturaController;
use App\Http\Controllers\viaturasController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas para a regiao
Route::get("/getregiao/{id?}", [RegiaoController::class, "index"]);
Route::get("/getinstancia/regiao/{id}", [RegiaoController::class, "getInstancia"]);
Route::get("/getProprietario/regiao/{id}", [RegiaoController::class, "getProprietario"]);
Route::post("/saveregiao", [RegiaoController::class, "store"]);
Route::delete("/deleteregiao/{id}", [RegiaoController::class, "destroy"]);
Route::put("/editregiao/{id}", [RegiaoController::class, "update"]);

// rotas para a nacionalidade
Route::get("/getnacionalidade/{id?}", [NacionalidadeController::class, "index"]);
Route::get("/getProprietario/nacionalidade/{id}", [NacionalidadeController::class, "getProprietario"]);
Route::post("/savenacionalidade", [NacionalidadeController::class, "store"]);
Route::delete("/deletenacionalidade/{id}", [NacionalidadeController::class, "destroy"]);
Route::put("/editnacionalidade/{id}", [NacionalidadeController::class, "update"]);

// rotas para a local de emissao da carta
Route::get("/getlocalemissaocarta/{id?}", [LocalEmissaoCartaController::class, "index"]);
Route::get("/getProprietario/localemissaocarta/{id}", [LocalEmissaoCartaController::class, "getProprietario"]);
Route::post("/savelocalemissaocarta", [LocalEmissaoCartaController::class, "store"]);
Route::delete("/deletelocalemissaocarta/{id}", [LocalEmissaoCartaController::class, "destroy"]);
Route::put("/editlocalemissaocarta/{id}", [LocalEmissaoCartaController::class, "update"]);

// rotas para a local de controle de entrada
Route::get("/getcontroleentrada/{id?}", [ControleEntradaController::class, "index"]);
Route::get("/getviatura/controleentrada/{id}", [ControleEntradaController::class, "getViatura"]);
Route::post("/savecontroleentrada", [ControleEntradaController::class, "store"]);
Route::delete("/deletecontroleentrada/{id}", [ControleEntradaController::class, "destroy"]);
Route::put("/editcontroleentrada/{id}", [ControleEntradaController::class, "update"]);

// rotas para a viatura
Route::get("/getviatura/{id?}", [ViaturaController::class, "index"]);
Route::delete("/deleteviatura/{id}", [ViaturaController::class, "destroy"]);

Route::get("/getContoleEntrada/viatura/{id}", [ViaturaController::class, "getContoleEntrada"]);
Route::get("/getEquipAuxiliar/viatura/{id}", [ViaturaController::class, "getEquipAuxiliar"]);
Route::get("/getProprietario/viatura/{id}", [ViaturaController::class, "getProprietario"]);
Route::post("/saveviatura", [ViaturaController::class, "store"]);
Route::put("/editviatura/{id}", [ViaturaController::class, "update"]);

// rotas para a instancia
Route::get("/getinstancia/{id?}", [InstanciaController::class, "index"]);
Route::get("/getRegiao/instancia/{id}", [InstanciaController::class, "getRegiao"]);
Route::post("/saveinstancia", [InstanciaController::class, "store"]);
Route::delete("/deleteinstancia/{id}", [InstanciaController::class, "destroy"]);
Route::put("/editinstancia/{id}", [InstanciaController::class, "update"]);

// rotas para a proprietario
Route::get("/getproprietario/{id?}", [ProprietarioController::class, "index"]);
Route::get("/getRegiao/proprietario/{id}", [ProprietarioController::class, "getRegiao"]);
Route::get("/getViatura/proprietario/{id}", [ProprietarioController::class, "getViatura"]);
Route::get("/getLocalEmissao/proprietario/{id}", [ProprietarioController::class, "getLocalEmissao"]);
Route::get("/getNacionalidade/proprietario/{id}", [ProprietarioController::class, "getNacionalidade"]);
Route::get("/getEndereco/proprietario/{id}", [ProprietarioController::class, "getEndereco"]);
Route::post("/saveproprietario", [ProprietarioController::class, "store"]);
Route::delete("/deleteproprietario/{id}", [ProprietarioController::class, "destroy"]);
Route::put("/editproprietario/{id}", [ProprietarioController::class, "update"]);



// rotas para a equipamentoauxiliar
Route::get("/getequipamentoauxiliar/{id?}", [EquipamentoAxiliarController::class, "index"]);
Route::get("/getViatura/equipamentoauxiliar/{id}", [EquipamentoAxiliarController::class, "getViatura"]);
Route::post("/saveequipamentoauxiliar", [EquipamentoAxiliarController::class, "store"]);
Route::delete("/deleteequipamentoauxiliar/{id}", [EquipamentoAxiliarController::class, "destroy"]);
Route::put("/editequipamentoauxiliar/{id}", [EquipamentoAxiliarController::class, "update"]);

// rotas para a endereco
Route::get("/getendereco/{id?}", [EnderecoController::class, "index"]);
Route::get("/getProprietario/endereco/{id}", [EnderecoController::class, "getProprietario"]);
Route::post("/saveendereco", [EnderecoController::class, "store"]);
Route::delete("/deleteendereco/{id}", [EnderecoController::class, "destroy"]);
Route::put("/editendereco/{id}", [EnderecoController::class, "update"]);


//rotas de Correcao
Route::post("/saveproprietario2", [ProprietariosController::class, "store2"]);
Route::post("/saveendereco2", [enderecoController2::class, "store2"]);
Route::post("/saveviatura2", [viaturasController::class, "store2"]);

Route::get("/counter", [ProprietariosController::class, "counter"]);
