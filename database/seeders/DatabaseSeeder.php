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
            DaysTableSeeder::class,
            DayShopTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            RolesTableSeeder::class,
            RoleUserTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
