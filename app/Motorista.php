<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'idade',
        'habilitacao',
        'tipo'
    ];
    
    public function veiculos(){

        return $this->hasMany('App\Veiculo');
    }
    
}
