<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermission('permission_access');
    }

    public function view(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission_show');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('permission_create');
    }

    public function update(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission_edit');
    }

    public function delete(User $user, Permission $permission): bool
    {
        return $user->hasPermission('permission_delete');
    }

}
