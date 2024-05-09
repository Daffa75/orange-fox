<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PeternakanPost;
use App\Models\User;

class PeternakanPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PeternakanPost');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PeternakanPost $peternakanpost): bool
    {
        return $user->checkPermissionTo('view PeternakanPost');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PeternakanPost');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PeternakanPost $peternakanpost): bool
    {
        return $user->checkPermissionTo('update PeternakanPost');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PeternakanPost $peternakanpost): bool
    {
        return $user->checkPermissionTo('delete PeternakanPost');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PeternakanPost $peternakanpost): bool
    {
        return $user->checkPermissionTo('restore PeternakanPost');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PeternakanPost $peternakanpost): bool
    {
        return $user->checkPermissionTo('force-delete PeternakanPost');
    }
}
