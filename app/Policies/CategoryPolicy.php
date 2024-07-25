<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{

    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return $user->hasPermission('category_access');
    }

    public function view(User $user, Category $category): bool
    {
        return $user->hasPermission('category_view');
    }

    public function create(User $user): bool
    {
        return $user->hasPermission('category_create');
    }

    public function update(User $user, Category $category): bool
    {
        return $user->hasPermission('category_edit');
    }

    public function delete(User $user, Category $category): bool
    {
        return $user->hasPermission('category_delete');
    }

}
