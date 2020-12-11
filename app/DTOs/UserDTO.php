<?php


namespace App\DTOs;

use Illuminate\Http\UploadedFile;
use Spatie\DataTransferObject\DataTransferObject;


class UserDTO  extends DataTransferObject
{
    public string $first_name;
    public string $last_name;
    public string $country_code;
    public string $phone_number;
    public string $gender;
    public string $birthdate;
    public UploadedFile $avatar;

    public ?string $email;
    public ?string $password;
}
