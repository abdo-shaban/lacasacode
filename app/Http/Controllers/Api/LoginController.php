<?php

namespace App\Http\Controllers\Api;

use App\Contracts\ILoginService;
use App\Contracts\IUserService;
use App\DTOs\LoginDTO;
use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserLoginResource;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __invoke(LoginRequest $request, ILoginService $loginService)
    {
        // TODO: Implement __invoke() method.
        try {
            return new UserLoginResource($loginService->login(new  LoginDTO($request->all())));
        }catch (\Exception $exception){
            return response()->json(['message' => $exception->getMessage()], $exception->getCode());
        }

    }
}
