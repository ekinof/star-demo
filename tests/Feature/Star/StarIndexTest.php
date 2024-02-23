<?php

declare(strict_types=1);

namespace Tests\Feature\Star;

use App\Models\Star;
use App\Models\User;

test('users can display a star list', function () {
    $user = User::factory()->create();
    Star::factory()->count(10)->create();

    $response = $this->actingAs($user)->get('/api/stars');

    $response->assertStatus(200);
    expect($response->json()['data'])
        ->toHaveCount(10);
});

test('guest can display a star list', function () {
    Star::factory()->count(10)->create();

    $response = $this->get('/api/stars');

    $response->assertStatus(200);
    expect($response->json()['data'])
        ->toHaveCount(10);
});
