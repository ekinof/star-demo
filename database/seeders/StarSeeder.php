<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Star;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Star::factory()->count(5)->create();
    }
}
