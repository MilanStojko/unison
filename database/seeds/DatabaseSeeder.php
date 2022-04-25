<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(AvailabilitySeeder::class);
        $this->call(SponsorshipSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MessageSeeder::class);
        $this->call(ReviewSeeder::class);
    }
}
