<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$vUIzDlvfpu2yOATsPYcPaOTY/zgbgwViLIWSfZxSlmRBFV.g/fmOW',
                'remember_token' => null,
            ],
        ];
        User::insert($users);
    }
}
