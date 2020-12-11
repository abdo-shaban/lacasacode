<?php


namespace App\Contracts;


use App\DTOs\UserStatusDTO;
use App\Models\User;

interface IUserStatusService
{
    function store(UserStatusDTO $userStatusDTO): User;

}
