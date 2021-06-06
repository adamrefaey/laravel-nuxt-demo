<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_can_register()
    {
        $response = $this->post('/auth/register', User::factory()->raw(['password' => 'default_password']));

        $response->assertCreated();
    }
}
