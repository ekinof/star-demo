<?php

declare(strict_types=1);

namespace Tests\Feature\Star;

use App\Models\Star;
use App\Models\User;

test('users can display a specific star', function () {
    $user = User::factory()->create();
    $star = Star::factory()->create();

    $response = $this->actingAs($user)->get('/api/stars/'.$star->id);

    $response->assertStatus(200);
    expect($response->json()['data'])
        ->toHaveCount(5)
        ->id->toBe($star->id)
        ->firstName->toBe($star->first_name)
        ->lastName->toBe($star->last_name)
        ->imageUrl->toBe($star->image_url)
        ->description->toBe($star->description);
});

test('guest cannot display a specific star', function () {
    $star = Star::factory()->create();

    $response = $this->get('/api/stars/'.$star->id);

    $response->assertStatus(302);
});
