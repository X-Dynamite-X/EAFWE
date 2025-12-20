<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware للتحقق من الصلاحيات
 * يتحقق من أن المستخدم لديه الصلاحية المطلوبة
 */
class CheckPermission
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$permissions): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        foreach ($permissions as $permission) {
            if (auth()->user()->can($permission)) {
                return $next($request);
            }
        }

        abort(403, 'ليس لديك الصلاحية المطلوبة');
    }
}
