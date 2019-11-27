<?php

namespace App\Exceptions;

use Encore\Admin\Reporter\Reporter;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use \Illuminate\Auth\AuthenticationException;



class Handler extends ExceptionHandler
{
    /**
     * мы не хотим логировать всякие ошибки типа 404 и невалидные CSRF-токены.
     *
     * A list of the exception types that are not reported.
     *
     * @var array
     */
	protected $dontReport = [
		AuthenticationException::class,
		TokenMismatchException::class,
		HttpException::class
	];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
	public function report(Exception $exception)
	{
		if ($this->shouldReport($exception)) {
			Reporter::report($exception);
		}
        parent::report($exception);
	}

	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param Exception $e
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function render($request, \Exception $e)
	{
		if ($e instanceof CustomException)  {
			return $e->render($request);
		}
		$statusCode = $this->getStatusCode($e);
			if ($request->wantsJson()) {
			return response()->json(['message' => $this->getMessage($e)], $statusCode);
		}
		// в режиме отладки выводим все ошибки как есть
		if (config('app.debug')) {
			return parent::render($request, $e);
		}
		// если это потомок \Symfony\Component\HttpKernel\Exception\HttpException
		if ($this->isHttpException($e)) {
			return $this->renderHttpException($e);
		}
		// иначе показываем стандартную страницу ошибки
		return response()->view('errors.500', [], 500);
	}

	protected function getStatusCode(\Exception $e)
	{
		if ($e instanceof HttpException) {
			return $e->getStatusCode();
		}
		// данное исключение не является потомком \Symfony\Component\HttpKernel\Exception\HttpException,
		// поэтому небольшой хак
		if ($e instanceof ModelNotFoundException) {
			return 404;
		}
		return 500;
	}

	protected function getMessage(\Exception $e)
	{
		// это исключение я создал сам и использую в моделях,
		// у него человекопонятные сообщения типа «Не удалось сохранить запись»
		if ($e instanceof QueryException) {
			return $e->getMessage();
		}
		if ($e instanceof ModelNotFoundException) {
			return trans('main.model_not_found');
		}
		return trans('main.something_wrong');
	}

	/**
	 * Convert an authentication exception into an unauthenticated response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Illuminate\Auth\AuthenticationException  $exception
	 * @return \Illuminate\Http\Response
	 */
	protected function unauthenticated($request, AuthenticationException $exception)
	{
		if ($request->expectsJson()) {
			return response()->json(['error' => 'Unauthenticated.'], 401);
		}

		return redirect()->guest(route('login.show'));
	}

	protected function whoopsHandler()
	{
		try {
			return app(\Whoops\Handler\HandlerInterface::class);
		} catch (\Illuminate\Contracts\Container\BindingResolutionException $e) {
			return parent::whoopsHandler();
		}
	}

}
