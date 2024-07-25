<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermission('user_access');
    }

    public function view(User $user, User $model): bool
    {
        return $user->hasPermission('user_view');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('user_create');
    }

    public function update(User $user, User $model): bool
    {
        return $user->hasPermission('user_edit');
    }

    public function delete(User $user, User $model): bool
    {
        return $user->hasPermission('user_delete');
    }

}
