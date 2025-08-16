<?php

/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Services;

use Illuminate\Contracts\Auth\Authenticatable;

class PermissionService
{
    public function hasPermission(string $permission, Authenticatable $user): bool
    {
        if (!method_exists($user, 'getPermissions')) {
            return false;
        }

        $permissions = $user->getPermissions();
        if (is_array($permissions) && in_array($permission, $permissions)) {
            return true;
        }

        return false;
    }
}
