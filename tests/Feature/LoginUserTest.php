<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStoreUserStatusSuccess()
    {
        // prepare
        $user = User::factory()->create();

        // act
        $response = $this->postJson('/api/login', [
            "phone_number" => $user->phone_number,
            "password"     => 'password'
        ]);

        // expect
        $response->assertStatus(200);
        $response->assertSee('token');
    }
}
