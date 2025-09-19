<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render an exception into an HTTP response.
     */
    public function render($request, Throwable $exception): Response
    {
        // Production ortamında 500 hatalarını anasayfaya yönlendir
        if (app()->environment('production')) {
            // 500 Internal Server Error durumunda
            if ($this->isHttpException($exception) && $exception->getStatusCode() == 500) {
                return redirect('/')->with('error', 'Bir hata oluştu, ana sayfaya yönlendirildiniz.');
            }
            
            // Diğer fatal error'lar için
            if ($exception instanceof \Error || 
                $exception instanceof \ErrorException ||
                $exception instanceof \ParseError ||
                $exception instanceof \TypeError) {
                
                // Hatayı logla
                report($exception);
                
                return redirect('/')->with('error', 'Sistemde bir sorun oluştu.');
            }
        }

        return parent::render($request, $exception);
    }
}
