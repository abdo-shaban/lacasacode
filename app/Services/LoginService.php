<?php


namespace App\Services;


use App\Contracts\ILoginService;
use App\DTOs\LoginDTO;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginService implements ILoginService
{

    private User $user;

    function login(LoginDTO $loginDTO): User
    {
        try {
            $this->user = $this->findUser($loginDTO);
            if (! is_null($this->user->password)){
                $this->checkUserCredentials($loginDTO->password, $this->user->password);
            }
            $this->saveApiToken();

            return $this->user;
        } catch (Exception $exception) {
            throw $exception;
        }
    }

    function saveApiToken()
    {
        $this->user->api_token = $this->generateToken();
        $this->user->save();
    }

    function findUser(LoginDTO $loginDTO): User
    {
        $user = User::query()
            ->where('phone_number', $loginDTO->phone_number)
            ->first();

        if (!$user) {
            throw new Exception('user not found', 404);
        }
        return $user;
    }

    function checkUserCredentials($password, $user_password):bool
    {
        if (!Hash::check($password, $user_password)) {
            throw new Exception('Invalid user credentials.', '400');
        }
        return true;
    }

    function generateToken(): string
    {
        return hash('sha256', Str::random(60));
    }
}
