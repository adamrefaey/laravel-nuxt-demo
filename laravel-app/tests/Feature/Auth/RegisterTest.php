<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_can_register()
    {
        $response = $this->postJson('/api/auth/register', User::factory()->raw(['password' => 'default_password']));

        $response->assertCreated();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_authenticated_user_can_not_register()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')
            ->postJson('/api/auth/register', User::factory()->raw(['password' => 'default_password']));

        $response->assertStatus(405);
    }

        $response->assertCreated();
    }
}
