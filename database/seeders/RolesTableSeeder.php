<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    public function run(): void
    {
        $roles = [
            [
                'id'    => 1,
                'title' => Role::ROLES['Admin'],
            ],
            [
                'id'    => 2,
                'title' => Role::ROLES['User'],
            ],
        ];

        DB::table('roles')->insert($roles);
    }

}
