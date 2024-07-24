<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
        $users = [
            [
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
            [
                'name'           => 'User',
                'email'          => 'user@user.com',
                'password'       => Hash::make('password'),
                'remember_token' => null,
            ],
        ];

        DB::table('users')->insert($users);
    }

}
