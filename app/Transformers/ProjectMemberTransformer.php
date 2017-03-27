<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\User;

/**
 * Class ProjectMemberTransformer
 * @package namespace App\Transformers;
 */
class ProjectMemberTransformer extends TransformerAbstract
{

    /**
     * Transform the \User entity
     * @param \User $member
     *
     * @return array
     */
    public function transform(User $member)
    {
        return [
            'member_id'         => (int) $member->id,
            'name'         => $member->name,
        ];
    }
}
