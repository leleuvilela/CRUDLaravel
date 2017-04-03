<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Presentable;
use Prettus\Repository\Traits\PresentableTrait;


class Client extends Model implements Presentable
{
    use PresentableTrait;

    protected $fillable = [
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'
    ];
}
