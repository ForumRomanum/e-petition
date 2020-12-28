<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRoles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Role::getAdminRole()) {
            $admin = new Role([
                'name' => 'Admin',
                'type' => Role::ADMIN
            ]);
            $admin->save();
        }
        if (!Role::getUserRole()) {
            $user = new Role(['name' => 'User']);
            $user->save();
        }
    }
}
