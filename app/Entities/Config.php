<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Config extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'endereco',
        'cep',
        'fone',
        'facebook',
        'instagram',
        'youtube',
        'latitude',
        'longitude',
        'fone1',
        'fone2',
    ];

}
