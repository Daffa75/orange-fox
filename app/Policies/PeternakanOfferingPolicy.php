<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\PeternakanOffering;
use App\Models\User;

class PeternakanOfferingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->checkPermissionTo('view-any PeternakanOffering');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PeternakanOffering $peternakanoffering): bool
    {
        return $user->checkPermissionTo('view PeternakanOffering');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->checkPermissionTo('create PeternakanOffering');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PeternakanOffering $peternakanoffering): bool
    {
        return $user->checkPermissionTo('update PeternakanOffering');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PeternakanOffering $peternakanoffering): bool
    {
        return $user->checkPermissionTo('delete PeternakanOffering');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PeternakanOffering $peternakanoffering): bool
    {
        return $user->checkPermissionTo('restore PeternakanOffering');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PeternakanOffering $peternakanoffering): bool
    {
        return $user->checkPermissionTo('force-delete PeternakanOffering');
    }
}
