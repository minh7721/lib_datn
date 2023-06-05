<?php

namespace Database\Seeders;

use Backpack\PermissionManager\app\Models\Role;
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
        //default admin

        $superAdminRole = Role::where('name', 'SuperAdmin')->first();
        if (!$superAdminRole){
            $role = Role::create(['name' => 'SuperAdmin']);
        }

        $user = \App\Models\User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Administrator',
            'password' => bcrypt('password'),
            'active_status' => true,
        ]);

        $user->assignRole($role);


        $this->call(CategorySeeder::class);
    }
}
