<?php

/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class RoleService
{
    public function hasRole(string $role, Authenticatable $user): bool
    {
        if (method_exists($user, 'hasRole')) {
            return $user->hasRole($role);
        }

        $roles = $user->getRoles() ?? [];

        if (in_array($role, $roles)) {
            return true;
        }

        return false;
    }
}
