<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Traits\TransformableTrait;

class ProjectMember extends Model
{
    use TransformableTrait;

    protected $fillable = [
        'project_id',
        'member_id',
    ];

}
