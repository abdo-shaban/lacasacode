<?php


namespace App\DTOs;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;


class LoginDTO  extends DataTransferObject
{
    public ?string $password;
    public string $phone_number;
}
