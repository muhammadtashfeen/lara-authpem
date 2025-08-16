<?php
/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Http\Controllers;

use Illuminate\Http\JsonResponse;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasPermission;
use Orchestra\Workbench\Http\Controllers\Controller;

class UserController extends Controller
{
    #[HasPermission('view_users')]
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'User list',
            'users' => [],
        ]);
    }
}
