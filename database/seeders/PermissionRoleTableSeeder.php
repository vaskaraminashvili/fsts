<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{

    public function run(): void
    {
        $admin_permissions = Permission::all();
        $user_permissions = Permission::whereIn('title', [
            'category_access',
            'category_show',
            'ticket_access',
            'ticket_show',
        ])
            ->get();

        Role::findOrFail(1)
            ->permissions()
            ->attach($admin_permissions->pluck('id'));
        Role::findOrFail(2)
            ->permissions()
            ->attach($user_permissions->pluck('id'));
    }

}
