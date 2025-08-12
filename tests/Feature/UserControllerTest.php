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
        $this->assertTrue(false);
    }
}
