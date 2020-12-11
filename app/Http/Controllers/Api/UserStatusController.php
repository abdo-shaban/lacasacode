<?php

namespace App\Http\Controllers\Api;

use App\Contracts\IUserStatusService;
use App\DTOs\UserStatusDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserStatusRequest;
use App\Http\Resources\UserResource;

class UserStatusController extends Controller
{

    public function store(StoreUserStatusRequest $request, IUserStatusService $userStatusService)
    {
        return new UserResource($userStatusService->store(new  UserStatusDTO($request->only(['status']))));
    }
}
