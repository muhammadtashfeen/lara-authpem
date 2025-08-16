<?php
/**
 * @author Muhammad Tashfeen
 * @copyright 2025 GAIA AG, Hamburg
 * @package pp
 *
 * Created using PhpStorm at 16.08.25 18:20
 */

namespace MuhammadTashfeen\LaraAuthpem\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD | Attribute::TARGET_FUNCTION | Attribute::IS_REPEATABLE)]
class HasPermission
{
    public function __construct(public string $permission)
    {
    }
}
