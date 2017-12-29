<?php
namespace App\Users\Transformers;

use League\Fractal\TransformerAbstract;
use App\Users\Models\User;

class UserTransformerNew extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id'                    => (string) Tiny::to($user->id),
            'email'                 => (string) $user->email,
            'name'                  => (string) $user->name,
            //'roles'                 => $user->roles,
            //'teams'                 => $user->teams,
            //'current_team_id'       => (string) Tiny::to($user->current_team_id),
            'created_at'            => (string) $user->created_at,
            'updated_at'            => (string) $user->updated_at,
            'deleted_at'            => (string) $user->deleted_at,
//            'links'   => [
//                [
//                    'rel' => 'self',
//                    'uri' => '/api/v2/users/' . Tiny::to($user->id),
//                ]
//            ],
        ];
    }

}