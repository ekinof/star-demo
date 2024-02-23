<?php

declare(strict_types=1);

namespace Tests\Feature\Star;

use App\Models\User;

test('users can create a star with valid data', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/api/stars', [
        'firstName' => 'Emma',
        'lastName' => 'Stone',
        'imageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Emma_Stone_at_the_39th_Mill_Valley_Film_Festival_%28cropped%29.jpg',
        'description' => 'Emma Stone est une actrice et productrice américaine, née le 6 novembre 1988 à Scottsdale',
    ]);

    $response->assertStatus(201);
    expect($response->json()['data'])
        ->toHaveCount(5)
        ->id->toBeInt()
        ->firstName->toBe('Emma')
        ->lastName->toBe('Stone')
        ->imageUrl->toBe('https://upload.wikimedia.org/wikipedia/commons/9/9a/Emma_Stone_at_the_39th_Mill_Valley_Film_Festival_%28cropped%29.jpg')
        ->description->toBe('Emma Stone est une actrice et productrice américaine, née le 6 novembre 1988 à Scottsdale');
});

test('guest cannot create a star with valid data', function () {
    $response = $this->post('/api/stars', [
        'firstName' => 'Emma',
        'lastName' => 'Stone',
        'imageUrl' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Emma_Stone_at_the_39th_Mill_Valley_Film_Festival_%28cropped%29.jpg',
        'description' => 'Emma Stone est une actrice et productrice américaine, née le 6 novembre 1988 à Scottsdale',
    ]);

    $response->assertStatus(302);
});

test('users cannot create a star with missing data', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/api/stars', []);

    $response->assertStatus(422);
    $response->assertJsonValidationErrors(['firstName', 'lastName', 'imageUrl', 'description']);
});
