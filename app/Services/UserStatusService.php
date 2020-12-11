<?php


namespace App\Services;


use App\Contracts\IUserStatusService;
use App\DTOs\UserStatusDTO;
use App\Models\Status;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserStatusService implements IUserStatusService
{
    function store(UserStatusDTO $userStatusDTO): User
    {

        try {
            DB::beginTransaction();

            $user = auth()->user();
            $user->statuses()->save(new Status(['status' => $userStatusDTO->status]));
            $user->load('statuses');
            DB::commit();

            return $user;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

    }
}
