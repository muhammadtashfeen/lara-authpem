<?php
/**
 * @author    Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Tests\Feature;

use MuhammadTashfeen\LaraAuthpem\Models\User;
use MuhammadTashfeen\LaraAuthpem\Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * Test if the user without access permission can access the user list.
     */
    public function testUnpermittedUserIsForbidden(): void
    {
        $user = new User();
        $user->setPermissions([]);
        $this->actingAs($user);

        $resp = $this->getJson('/users');
        $resp->assertForbidden();
    }

    /**
     * Test if the user with access permission can access the user list.
     */
    public function testPermittedUserCanAccessUserList(): void
    {
        $user = new User();
        $user->setPermissions(['view_users']);
        $this->actingAs($user);

        $resp = $this->getJson('/users');
        $resp->assertOk();
        $resp->assertJson([
            'message' => 'User list',
            'users' => [],
        ]);
    }
}
