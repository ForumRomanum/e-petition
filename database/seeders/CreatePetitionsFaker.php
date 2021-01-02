<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\Petition;
use Illuminate\Database\Seeder;

class CreatePetitionsFaker extends Seeder
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
                Petition::factory()->create();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
    }
}
