<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Medico extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'nome',
        'email',
        'crm',
        'username',
        'senha',
        'endereco',
        'cep',
        'cidade',
        'estado',
        'telefone',
        'latitude',
        'longitude'
    ];

}
