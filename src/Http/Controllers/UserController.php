<?php
/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Orchestra\Workbench\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'User list',
            'users' => [],
        ]);
    }
}
