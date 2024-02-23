<?php

declare(strict_types=1);

namespace Tests\Feature\Star;

use App\Models\Star;
use App\Models\User;

test('users can destroy a specific star', function () {
    $user = User::factory()->create();
    $star = Star::factory()->create();

    $response = $this->actingAs($user)->delete('/api/stars/'.$star->id);

    $response->assertStatus(204);

    $this->assertDatabaseMissing($star->getTable(), [
        'id' => $star->id,
    ]);
});

test('guest cannot destroy a specific star', function () {
    $star = Star::factory()->create();

    $response = $this->delete('/api/stars/'.$star->id);

    $response->assertStatus(302);

    $this->assertDatabaseHas($star->getTable(), [
        'id' => $star->id,
    ]);
});
