<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class GaleriaFoto extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'galeria_id',
        'foto_id',
    ];

}
