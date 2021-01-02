<?php

namespace Database\Seeders;

use App\Helpers\Helpers;
use App\Models\Sign;
use Illuminate\Database\Seeder;

class CreateSignsFaker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Helpers::isProduction()) {
            $this->command->getOutput()->progressStart(100000);
            for ($i = 1; $i <= 100000; $i++) {
                Sign::factory()->create();
                $this->command->getOutput()->progressAdvance();
            }
            $this->command->getOutput()->progressFinish();
        }
    }
}
