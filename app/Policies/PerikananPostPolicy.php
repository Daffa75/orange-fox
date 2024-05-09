<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PerikananPost;
use App\Models\User;

class PerikananPostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PerikananPost');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerikananPost $perikananpost): bool
    {
        return $user->checkPermissionTo('view PerikananPost');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PerikananPost');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerikananPost $perikananpost): bool
    {
        return $user->checkPermissionTo('update PerikananPost');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerikananPost $perikananpost): bool
    {
        return $user->checkPermissionTo('delete PerikananPost');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerikananPost $perikananpost): bool
    {
        return $user->checkPermissionTo('restore PerikananPost');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerikananPost $perikananpost): bool
    {
        return $user->checkPermissionTo('force-delete PerikananPost');
    }
}
