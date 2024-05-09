<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PerikananOffering;
use App\Models\User;

class PerikananOfferingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PerikananOffering');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PerikananOffering $perikananoffering): bool
    {
        return $user->checkPermissionTo('view PerikananOffering');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PerikananOffering');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PerikananOffering $perikananoffering): bool
    {
        return $user->checkPermissionTo('update PerikananOffering');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PerikananOffering $perikananoffering): bool
    {
        return $user->checkPermissionTo('delete PerikananOffering');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PerikananOffering $perikananoffering): bool
    {
        return $user->checkPermissionTo('restore PerikananOffering');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PerikananOffering $perikananoffering): bool
    {
        return $user->checkPermissionTo('force-delete PerikananOffering');
    }
}
