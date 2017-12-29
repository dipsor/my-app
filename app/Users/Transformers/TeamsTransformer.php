<?php

namespace App\Users\Transformers;

use League\Fractal\TransformerAbstract;
use App\Users\Models\Team;

/**
 * Class RoleTransformer
 * @package App\Users\Transformers
 */
class TeamTransformer extends TransformerAbstract
{
    /**
     * @param Team $team
     * @return array
     */
    public function transform(Team $team): array
    {
        return [
            'id'                    => (string) $team->id,
            'owners_id'             => (string) $team->owners_id,
            'name'                  => (string) $team->name,
            'created_at'            => (string) $team->created_at,
            'updated_at'            => (string) $team->updated_at,
            'deleted_at'            => (string) $team->deleted_at,
        ];
    }
}