<?php
/**
 * Created by PhpStorm.
 * User: Notebook
 * Date: 27/03/2017
 * Time: 09:34
 */

namespace App\Transformers;

use App\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{
    public function transform(Client $client)
    {
        return [
            'id' => (int) $client->id,
            'name' => $client->name,
            'responsible' => $client->responsible,
            'email' => $client->email,
            'phone' => $client->phone,
            'address' => $client->address,
            'obs' => $client->obs
        ];
    }


}