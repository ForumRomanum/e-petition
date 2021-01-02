<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Helpers::isProduction()) {
            $this->command->getOutput()->progressStart(100);
            for ($i = 1; $i <= 100; $i++) {
                User::factory()->make()->save();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
    }
}
