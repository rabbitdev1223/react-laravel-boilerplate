<?php

namespace App\Services\User;

use App\Contracts\Repository\UserRepositoryContract as UserRepository,
    Illuminate\Contracts\Routing\ResponseFactory as Response,
    Illuminate\Contracts\Validation\Factory as Validator,
    Illuminate\Validation\ValidationException,
    Laravel\Passport\ApiTokenCookieFactory,
    Illuminate\Http\Request;

class SignUpService {
  private $validator;
  private $response;
  private $cookie;
  private $user;
  private $oAuthService;

  public function __construct(
    Validator $validator,
    UserRepository $user,
    Response $response,
    ApiTokenCookieFactory $cookie)
  {
    $this->user = $user;
    $this->cookie = $cookie;
    $this->response = $response;
    $this->validator = $validator;
  }

  public function validateUserData($data)
  {
    return $this->validator->make($data, [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|email|unique:users,email',
      'password' => 'required'
    ]);
  }

  public function signUp($userInfo, $csrfToken)
  {
    $dataValidator = $this->validateUserData($userInfo);

    if ($dataValidator->fails()) {
      return $this->response->validateError($dataValidator->failed());
    }

    $newUser = $this->user->create($userInfo);

    

    // We need to call the password grant endpoint here so that our token is saved in
    // the database.
    $apiCookie = $this->cookie->make($newUser->id, $csrfToken);

    return $this->response->success(['message' => 'User successfully signed up'])->withCookie($apiCookie);
  }
}
