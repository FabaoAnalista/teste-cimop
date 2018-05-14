<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Motorista;
use App\Veiculo;
use DB;
use App\Http\Requests\MotoristasRequest;

class MotoristasController extends Controller

{
    //padrão de projeto singleton
    private $motoristas;
    private $veiculos;

    public function __construct(Motorista $motoristas,Veiculo $veiculos) {
        $this->motoristas = $motoristas;
        $this->veiculos = $veiculos;
    }
    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }



    //metodo para consulta de todos motoristas cadastrados
    public function index(){
        
        if (!isset(self::$motoristas)) {
            $motoristas = Motorista::with('veiculos')->get();
        }
        
        if(!$motoristas) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }
        return response()->json($motoristas);

    }

    public function store(Request $request, Motorista $motoristas, Veiculo $veiculos)
    {

        return DB::transaction(function() use ($request, $motoristas, $veiculos) {

            $motoristas->nome = $request->nome;
            $motoristas->idade = $request->idade;
            $motoristas->habilitacao = $request->habilitacao;
            $motoristas->tipo = $request->tipo;
            $motoristas->save();

            
            $transaction = Veiculo::create([
            'motorista_id' => $request->id,       
            ]);
            $veiculos->chassi = $request->chassi;
            $veiculos->renavam = $request->renavam;
            $veiculos->marca = $request->marca;
            $veiculos->modelo = $request->modelo;
            $veiculos->cor = $request->cor;
            $veiculos->placa = $request->placa;
            $veiculos->save();
            return $this->showOne($transaction, 201);
        });
        $validate = validator($data, $this->motoristas->rules());
                if ( $validate->fails() ) {
                    $messages = $validate->messages();
                    return response()->json(['validate_error' => $messages], 422);
                }
                if (!$insert = $this->motoristas->create($data) ) {
                    return response()->json(['error' => 'error_insert'], 500);
                }

    }


}

