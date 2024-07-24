<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    public function run(): void
    {
        $permissions = [
            [
                'title' => 'permission_create',
            ],
            [
                'title' => 'permission_edit',
            ],
            [
                'title' => 'permission_delete',
            ],
            [
                'title' => 'permission_show',
            ],
            [
                'title' => 'permission_access',
            ],
            [
                'title' => 'role_create',
            ],
            [
                'title' => 'role_edit',
            ],
            [
                'title' => 'role_delete',
            ],
            [
                'title' => 'role_show',
            ],
            [
                'title' => 'role_access',
            ],
            [
                'title' => 'category_create',
            ],
            [
                'title' => 'category_edit',
            ],
            [
                'title' => 'category_delete',
            ],
            [
                'title' => 'category_show',
            ],
            [
                'title' => 'category_access',
            ],
            [
                'title' => 'ticket_create',
            ],
            [
                'title' => 'ticket_edit',
            ],
            [
                'title' => 'ticket_delete',
            ],
            [
                'title' => 'ticket_show',
            ],
            [
                'title' => 'ticket_access',
            ],
            [
                'title' => 'user_create',
            ],
            [
                'title' => 'user_edit',
            ],
            [
                'title' => 'user_delete',
            ],
            [
                'title' => 'user_show',
            ],
            [
                'title' => 'user_access',
            ],
        ];
        DB::table('permissions')->insert($permissions);
    }

}
