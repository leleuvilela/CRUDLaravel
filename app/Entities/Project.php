<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function client()
    {
        return $this->belongsTo('App\Entities\Client');
    }

    public function user()
    {
        return $this->belongsTo('App\Entities\User', 'owner_id');
    }
}
