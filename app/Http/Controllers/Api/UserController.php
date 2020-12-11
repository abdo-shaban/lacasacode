<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IUserService;
use App\DTOs\UserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function store(StoreUserRequest $request, IUserService $userService)
    {
        return new UserResource($userService->store(new  UserDTO($request->all())));
    }
}
