<?php

/**
 * @author Muhammad Tashfeen
 */

namespace MuhammadTashfeen\LaraAuthpem\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasPermission;
use MuhammadTashfeen\LaraAuthpem\Attributes\HasRole;
use MuhammadTashfeen\LaraAuthpem\Services\PermissionService;
use MuhammadTashfeen\LaraAuthpem\Services\RoleService;
use ReflectionMethod;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthAndPemMiddleware
{
    public function __construct(private PermissionService $permissionService, private RoleService $roleService)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $route = $request->route();

        if (!$route) {
            return $next($request);
        }

        $action = $route->getActionName();

        if ($action === 'Closure' || str_contains($action, 'Closure')) {
            return $next($request);
        }

        [$controller, $method] = explode('@', $action);

        if (!class_exists($controller) || !method_exists($controller, $method)) {
            return $next($request);
        }

        $reflectionMethod = new ReflectionMethod($controller, $method);

        $attributes = array_merge(
            $reflectionMethod->getAttributes(HasRole::class),
            $reflectionMethod->getAttributes(HasPermission::class),
        );
        $user = $request->user();

        foreach ($attributes as $attribute) {
            $ok = true;
            $instance = $attribute->newInstance();

            if ($instance instanceof HasRole) {
                $ok = $this->roleService->hasRole($instance->role, $user);
            }

            if ($instance instanceof HasPermission) {
                $ok = $this->permissionService->hasPermission($instance->permission, $user);
            }

            if (!$ok) {
                return response()->json([
                    'message' => 'Forbidden.',
                ], Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);
    }
}
