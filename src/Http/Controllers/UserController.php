<?php
/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Http\Controllers;

use Illuminate\Http\JsonResponse;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasPermission;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasRole;
use Orchestra\Workbench\Http\Controllers\Controller;

class UserController extends Controller
{
    #[HasRole('admin')]
    #[HasPermission('view_users')]
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'User list',
            'users' => [],
        ]);
    }

    #[HasRole('admin')]
    #[HasRole('editor')]
    #[HasPermission('create_users')]
    #[HasPermission('edit_users')]
    public function store(): JsonResponse
    {
        return response()->json([
            'message' => 'User created successfully',
        ]);
    }
}
