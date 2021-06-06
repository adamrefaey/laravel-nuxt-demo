<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
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

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_hash_password_on_register()
    {
        $email = 'some.user@mail.com';
        $password = 'default_password';
        $response = $this->postJson('/api/auth/register', User::factory()->raw(compact('email', 'password')));
        $response->assertCreated();

        $user = User::where(compact('email'))->first();
        $this->assertTrue(Hash::check($password, $user->password), 'password hash match');
    }
}
