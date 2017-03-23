<?php
/**
 * Created by PhpStorm.
 * User: leleuvilela
 * Date: 23/03/17
 * Time: 14:41
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator
{
    protected $rules = [
        'name' => 'required|max:255',
        'responsible' => 'required|max:255',
        'email' => 'required|email',
        'phone' => 'required',
        'address' => 'required'
    ];
}