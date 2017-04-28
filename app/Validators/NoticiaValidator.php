<?php
/**
 * Created by PhpStorm.
 * User: leleuvilela
 * Date: 23/03/17
 * Time: 14:41
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class NoticiaValidator extends LaravelValidator
{
    protected $rules = [
        'titulo' => 'required|max:255',
    ];
}