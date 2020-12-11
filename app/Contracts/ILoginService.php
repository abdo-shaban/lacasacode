<?php


namespace App\Contracts;


use App\DTOs\LoginDTO;
use App\Models\User;

interface ILoginService
{
    function login(LoginDTO $loginDTO): User;

    function findUser(LoginDTO $loginDTO): User;

    function checkUserCredentials(string $password, string $user_password): bool;

    function generateToken(): string;

}
