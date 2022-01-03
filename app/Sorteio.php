<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    protected $fillable = ['descricao'];
    public function usuarios()
    {
        return $this->belongsToMany(User::class);
    }
    public function participantes()
    {
        return $this->belongsToMany(Participante::class);
    }
}
