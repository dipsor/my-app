<?php

namespace App\Users\Transformers;

use League\Fractal\TransformerAbstract;
use App\Users\Models\Role;

/**
 * Class RoleTransformer
 * @package App\Users\Transformers
 */
class RoleTransformer extends TransformerAbstract
{
    /**
     * @param Role $role
     * @return array
     */
    public function transform(Role $role): array
    {
        return [
            'id'                    => (string) $role->id,
            'name'                  => (string) $role->name,
            'guard_name'            => (string) $role->guar_name,
            'created_at'            => (string) $role->created_at,
            'updated_at'            => (string) $role->updated_at,
            'deleted_at'            => (string) $role->deleted_at,
        ];
    }
}