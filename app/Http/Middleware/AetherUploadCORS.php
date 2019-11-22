<?php

namespace App\Http\Middleware;

use Closure;
use AetherUpload\ConfigMapper;

class AetherUploadCORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $origin = $request->server('HTTP_ORIGIN') ?: '';

        if ( in_array($origin, ConfigMapper::get('distributed_deployment_allow_origin')) ) {
            $response->header('Access-Control-Allow-Origin', $origin); # Допущение исходного домена
            $response->header('Access-Control-Allow-Headers', 'X-CSRF-TOKEN'); # Разрешение поля заголовка запроса
            $response->header('Access-Control-Allow-Methods', 'POST, OPTIONS'); # Метод позволяет запрос
            $response->header('Access-Control-Allow-Credentials', 'true'); # Если разрешено cokies
            $response->header('Access-Control-Max-Age', '3600'); # Предполетный запрос время кэша
            # Добавление другого пользовательского контента
        }


        return $response;
    }
}
