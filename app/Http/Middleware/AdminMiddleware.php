<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Read the authenticated user
        $user = $request->user();

        // Return 401 if unauthenticated
        if (! $user) {
            return response()->json([
                'message' => 'Unauthenticated.',
            ], 401);
        }

        // Return 403 if user is not an admin
        if ($user->role !== 'admin') {
            return response()->json([
                'message' => 'Forbidden. Admin access only.',
            ], 403);
        }

        // Allow admin to continue
        return $next($request);
    }
}
