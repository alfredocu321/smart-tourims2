<?php

namespace App\Policies;

use App\Models\Photo360;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class Photo360Policy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Photo360 $photo360): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Photo360 $photo360): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Photo360 $photo360): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Photo360 $photo360): bool
    {
        return $user->hasRole(['Admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Photo360 $photo360): bool
    {
        return $user->hasRole(['Admin']);
    }
}
