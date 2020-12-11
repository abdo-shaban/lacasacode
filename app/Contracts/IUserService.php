<?php


namespace App\Contracts;


use App\DTOs\UserDTO;
use App\Models\User;

interface IUserService
{
    function store(UserDTO $userDTO): User;

}
