<?php
/**
 * @author    Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Tests\Feature;

use MuhammadTashfeen\LaraAuthpem\Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function testUnauthorizedUserIsBlocked(): void
    {
        $resp = $this->getJson('/users');
        $resp->assertSuccessful();
    }
}
