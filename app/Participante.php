<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
    public $timestamps = false;
    protected $fillable = ['descricao',
                            'possui',
                            'user_id'];
    public function sorteios()
    {
        return $this->belongsToMany(Sorteio::class);
    }
}
