<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Owner;
use Illuminate\Auth\Access\HandlesAuthorization;

class OwnerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('owner index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Owner  $model
     * @return bool
     */
    public function view(User $user, Owner $model): bool
    {
        if ($user->can('owner show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        if ($user->can('owner create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Owner  $model
     * @return bool
     */
    public function update(User $user, Owner $model): bool
    {
        if ($user->can('owner update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User   $user
     * @param  Owner  $model
     * @return bool
     */
    public function delete(User $user, Owner $model): bool
    {
        if ($user->can('owner delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User   $user
     * @param  Owner  $model
     * @return void
     */
    public function restore(User $user, Owner $model): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User   $user
     * @param  Owner  $model
     * @return void
     */
    public function forceDelete(User $user, Owner $model): void
    {
        //
    }


    /**
     * Determine whether the user can delete two or more users at a time.
     *
     * @param  User $user
     * @return bool
     */
    public function destroyMany(User $user): bool
    {
        if ($user->can('owner destroy-many')) {
            return true;
        }
        return false;
    }
}
