<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AuthController as BaseAuthController;
use Encore\Admin\Extension;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use KevinSoft\MultiLanguage\MultiLanguage;
use Illuminate\Support\Facades\Cookie;


class AuthController extends BaseAuthController
{

	use ThrottlesLogins;

	public $maxAttempts;
	public $decayMinutes;

	public function __construct()
	{
		$this->maxAttempts  = config('admin.extensions.auth-attempts.maxAttempts', 5);
		$this->decayMinutes = config('admin.extensions.auth-attempts.decayMinutes', 1);
	}

	public function locale() {
		$locale = Input::get('locale');
		$languages = MultiLanguage::config('languages');
		if(array_key_exists($locale, $languages)) {

			return response('ok')->cookie('locale', $locale);
		}
	}


	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|
	 * \Illuminate\Routing\Redirector|\Illuminate\Support\Facades\Redirect|\Illuminate\View\View
	 */
	public function getLogin()
	{
		if ($this->guard()->check()) {
			return redirect($this->redirectPath());
		}

		$languages = MultiLanguage::config('languages');
		$current = MultiLanguage::config('default');
		if(Cookie::has('locale')) {
			$current = Cookie::get('locale');
		}

		return view('auth-attempts::login', compact('languages', 'current'));
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|mixed|void
	 * @throws ValidationException
	 */
	public function postLogin(Request $request)
	{
		// правила
		$rules = [
			$this->username()   => 'required',
			'password'          => 'required',
		];

		if(config('admin.auth.captcha')) {

			// если включена капча
			$rules ['captcha'] = 'required|captcha';
			$credentials = $request->only(array_keys($rules));
		} else {
			$credentials = $request->only(array_keys($rules));
		}

		/** @var \Illuminate\Validation\Validator $validator */
		$validator = Validator::make($credentials, $rules);
		unset($credentials['captcha']);

		if ($validator->fails()) {
			return back()->withInput()->withErrors($validator);
		}

		$remember = $request->get('remember', false);
		if ($this->guard()->attempt($credentials, $remember)) {
			return $this->sendLoginResponse($request);
		}

		// Если слишком много неудачных попыток входа.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);
			// вывод ошибки попыток входа
			$this->sendLockoutResponse($request);

		}

        // Приращение попыток входа пользователя в систему.
		$this->incrementLoginAttempts($request);
		// показ ошибки
		return back()->withInput()->withErrors([
			$this->username() => $this->getFailedLoginMessage(),
		]);
	}

}
