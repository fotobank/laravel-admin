<?php

namespace App\Http\Middleware;

use App\Admin\Controllers\AuthController;
use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;

class VerifyCsrfToken extends Middleware
{
    /**
     * url запросов, для которых не нужно проверять CSRF токен
     *
     * The URIs that should be excluded from CSRF verification.
     * URI, которые должны быть исключены из проверки CSRF.
     *
     * @var array
     */
    protected $except = [
	    '/logout',
    ];


	/**
	 * Если сессия устарела и токен не верный
	 * Т.е. если это был ajax-запрос, мы вернем нормальный json-ответ. Код 423 выбран для удобства,
	 * что бы было проще отслеживать это событие на клиенте. При получении такого ответа клиент может
	 * сохранить данные формы в localStorage, перенаправить пользователя на страницу логина и т.д.
	 * Можно дополнительно выбрасывать ещё одно исключение, чтобы логировать факт
	 * «протухания» сессии/токена.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Closure $next
	 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|mixed
	 */
	public function handle($request, Closure $next)
	{
		try {
			return parent::handle($request, $next);
		} catch (TokenMismatchException $e) {
			if ($request->wantsJson()) {
				return response()->json(['message' => 'Надо залогиниться'], 423);
			}
			if ($request->ajax())
			{
				return response()->json(['message' => 'Надо залогиниться', 'redirect' => 'auth/login'], 423);
			}

			// вывести ошибку при неправильном csrf токене
			if( !$this->tokensMatch($request)) {
				throw ValidationException::withMessages([
					'csrf' => [Lang::get('auth.csrf')]
				])->status(418);
			}
			// альтернативный вариант вывода ошибки csrf
//			return back()->withInput()->withErrors([
//				'csrf' => 'ошибка csrf'
//			]);

			return redirect()->route('auth.login.show');
		}
	}

}
