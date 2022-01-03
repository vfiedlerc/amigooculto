<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = 'resultados';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'id_usuario';
    protected $fillable = ['id_usuario','id_sorteado','sorteou'];

    public function relacoes (){
        //return $this->belongsToMany('\App\Resultado');
        return $this->belongsToMany('App\Resultado', 'resultados', 'id_usuario', 'id_sorteado')->withPivot('id_sorteio');;
    }
    
}
