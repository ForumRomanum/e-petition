<?php

namespace Database\Seeders;

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
        $this->call([
            CreateRoles::class,
            CreateAdmin::class,
            CreateUsersFaker::class,
            CreatePetitionsFaker::class,
            CreateSignsFaker::class
        ]);
    }
}
