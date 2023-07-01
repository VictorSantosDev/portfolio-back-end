<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Authentication\Database\Seeders\SeedSecretAuthorizationTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(SeedSecretAuthorizationTableSeeder::class);
    }
}
