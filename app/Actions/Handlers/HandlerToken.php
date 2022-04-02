<?php

namespace App\Actions\Handlers;

use App\Models\RoleAbility;
use App\Models\User;

/**
 * Handler Token Auth Sanctum
 */
class HandlerToken
{
    /**
     * Token Ability
     * 
     * @param  \App\Models\User $user
     * @return string
     */
    public static function generate(User $user)
    {
        $role_abilities = RoleAbility::where('role_id', $user->role_id)->get()->pluck('abilities');
        foreach ($role_abilities as $value) {
            $abilities[] = $value->ability;
        }

        return $user->createToken($user->roles()->value('role_name'), $abilities)->plainTextToken;
    }
}
