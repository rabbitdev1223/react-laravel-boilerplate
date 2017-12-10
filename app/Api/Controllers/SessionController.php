<?php

namespace App\Api\Controllers;

use Illuminate\Contracts\Auth\Factory as Auth,
		App\Services\LoginService,
		App\Services\LogoutService,
		Illuminate\Http\Request;

class SessionController {

	private $loginService;
	private $logoutService;
	private $auth;

	public function __construct(
		LoginService $loginService,
		LogoutService $logoutService,
		Auth $auth) {
		$this->loginService = $loginService;
		$this->logoutService = $logoutService;
		$this->auth = $auth;
	}

	public function currentUser()
	{
		return $this->auth->user()->toJson();
	}

	public function login(Request $request)
	{
		$this->loginService->attemptLogin($request);
	}

	public function logOut()
	{
		$this->logoutService->logOut();
	}
}
