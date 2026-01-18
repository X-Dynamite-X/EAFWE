<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get locale from session or use default
        $locale = session('locale', config('app.locale'));

        // Ensure locale is in supported list
        if (!in_array($locale, ['ar', 'en'])) {
            $locale = config('app.locale');
        }

        // Set application locale immediately
        app()->setLocale($locale);

        // Store in session for persistence
        session(['locale' => $locale]);

        return $next($request);
    }
}
