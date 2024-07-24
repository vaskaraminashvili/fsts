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
        $user_permissions = Permission::where('title', 'LIKE', 'ticket_%')
            ->get();

        Role::findOrFail(1)
            ->permissions()
            ->attach($admin_permissions->pluck('id'));
        Role::findOrFail(2)
            ->permissions()
            ->attach($user_permissions->pluck('id'));
    }

}
