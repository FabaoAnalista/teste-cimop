<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{   
    public $timestamps = false;
    protected $fillable = ['motorista_id','chassi','renavam','marca','modelo','placa','cor'];
    
  
    public function motoristas(){
        
        return $this->belongsTo('App\Motorista');
    }
    
}
