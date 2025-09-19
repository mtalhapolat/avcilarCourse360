<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class ErrorRedirectMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $response = $next($request);
            
            // 500 status code kontrolü
            if ($response->getStatusCode() >= 500 || $response->getStatusCode() == 404) {
                if (app()->environment('production')) {
                    return redirect('/')->with('error', 'Bir hata oluştu, ana sayfaya yönlendirildiniz.');
                }
            }
            
            return $response;
            
        } catch (Throwable $exception) {
            if (app()->environment('production')) {
                // Hatayı logla
                report($exception);
                return redirect('/')->with('error', 'Sistemde bir sorun oluştu.');
            }
            
            throw $exception;
        }
    }
}