<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function __construct(
        private readonly UserSeeder $userSeeder,
        private readonly StarSeeder $starSeeder,
    ) {
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->userSeeder->run();
        $this->starSeeder->run();
    }
}
