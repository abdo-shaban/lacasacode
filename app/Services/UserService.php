<?php


namespace App\Services;


use App\Contracts\IUserService;
use App\DTOs\UserDTO;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;

class UserService implements IUserService
{

    public function store(UserDTO $userDTO): User
    {

        try {
            DB::beginTransaction();
            $user = new User();
            $user->first_name = $userDTO->first_name;
            $user->last_name = $userDTO->last_name;
            $user->country_code = $userDTO->country_code;
            $user->phone_number = $userDTO->phone_number;
            $user->gender = $userDTO->gender;
            $user->birthdate = $userDTO->birthdate;
            $user->email = $userDTO->email;
            $user->save();

            $user->addMedia($userDTO->avatar)->toMediaCollection('avatar');
            DB::commit();
            return $user;
        } catch (Exception $exception) {
            DB::rollBack();
            throw $exception;
        }

    }
}
