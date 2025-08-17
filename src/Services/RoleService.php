<?php
/**
 * @author Muhammad Tashfeen
 * @copyright 2025 GAIA AG, Hamburg
 * @package pp
 *
 * Created using PhpStorm at 17.08.25 08:36
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
