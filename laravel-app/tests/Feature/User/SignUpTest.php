<?php

use App\Models\User;

test('users can be created', function () {
    User::factory()->create();

    $this->assertDatabaseHas('users', ['id' => 1]);
});
