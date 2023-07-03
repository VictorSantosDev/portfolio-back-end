<?php

namespace Modules\Authentication\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CheckAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Cache::has('authentication')){
            return $this->response(
                'error',
                'Não está autenticado.',
                Response::HTTP_UNAUTHORIZED
            );
        }

        if(Cache::get('authentication') !== $request->header('Authorization')){
            return $this->response(
                'error',
                'O token é inválido.',
                Response::HTTP_UNAUTHORIZED
            );
        }

        return $next($request);
    }

    private function response(
        string $key = 'result',
        string $message,
        string $status = Response::HTTP_OK
    ): JsonResponse {
        return response()->json([
            $key => $message
        ], $status);
    }
}
