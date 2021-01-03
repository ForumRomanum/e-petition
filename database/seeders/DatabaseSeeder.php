<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
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
        $devSeeds = Helpers::isProduction() ? [] : [
            CreateUsersFaker::class,
            CreatePetitionsFaker::class,
            CreateSignsFaker::class
        ];
        $this->call(
            array_merge([
                CreateRoles::class,
                CreateAdmin::class,
            ], $devSeeds)
        );
    }
}
