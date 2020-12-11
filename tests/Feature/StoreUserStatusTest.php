<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StoreUserStatusTest extends TestCase
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
        $response = $this->actingAs($user)->postJson('/api/statuses', [
            "status"       => "test",
            "auth-token"   => $user->api_token,
            "phone_number" => $user->phone_number,
        ]);


        // expect
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data.statuses');
        $response->assertSee('test');
    }
}
