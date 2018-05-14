<?php

namespace App\Http\Controllers;

use App\Http\Requests\VeiculosRequest as Request;
use App\Veiculo;

class VeiculosController extends Controller
{   
//padrão de projeto singleton
private $veiculos;

    public function __construct(Veiculo $veiculos) {
        $this->veiculos = $veiculos;
    }

    //metodo retorna todos os veiculos 
    public function index(){
        
        $veiculos = Veiculo::all();
        if(!$veiculos) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }else{
            response()->json(['data' => $veiculos], 200);
        }
        return Veiculo::all();
    }
    
    public function store(Request $request){
        Veiculo::create($request->all());

        $data = $request->json()->all();
        
        $validate = validator($data, $this->veiculos->rules());
            if ( $validate->fails() ) {
                $messages = $validate->messages();
                return response()->json(['validate_error' => $messages], 422);
            }
            if (!$insert = $this->product->create($data) ) {
                return response()->json(['error' => 'error_insert'], 500);
            }
                
            return response()->json(['data' => $insert], 201);
        }
        
    }

