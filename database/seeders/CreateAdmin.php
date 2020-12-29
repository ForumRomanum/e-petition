<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRoleId = Role::getAdminRole()->id;
        if (!User::where('role_id', $adminRoleId)->first()) {
            $adminUser = new User([
                'first_name' => 'System',
                'last_name' => 'Admin',
                'role_id' => $adminRoleId,
                'email' => env('ADMIN_EMAIL'),
                'is_active' => true
            ]);
            $generateRandomString = Str::random(60);
            $token = Hash::make($generateRandomString);
            $adminUser->api_token = $token;
            $adminUser->password = Hash::make(env('ADMIN_PASSWORD'));
            $adminUser->save();
        }
    }
}
