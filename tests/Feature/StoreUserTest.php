<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreUserSuccess()
    {
        // prepare
        Storage::fake('avatars');
        $file = UploadedFile::fake()->image('avatar.jpg');

        // act
        $response = $this->postJson('/api/users', [
            "first_name"   => "abdo",
            "last_name"    => "shaban",
            "country_code" => "EG",
            "phone_number" => "+201287322178",
            "gender"       => "male",
            "birthdate"    => "1995-06-01",
            "avatar"       => $file
        ]);

        // expect
        $response->assertStatus(201);
    }
}
