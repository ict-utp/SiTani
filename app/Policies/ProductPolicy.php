<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
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
        if ($user->can('product index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  Product $model
     * @return bool
     */
    public function view(User $user, Product $model): bool
    {
        if ($user->can('product show')) {
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
        if ($user->can('product create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Product  $model
     * @return bool
     */
    public function update(User $user, Product $model): bool
    {
        if ($user->can('product update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User   $user
     * @param  Product  $model
     * @return bool
     */
    public function delete(User $user, Product $model): bool
    {
        if ($user->can('product delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User   $user
     * @param  Product  $model
     * @return void
     */
    public function restore(User $user, Product $model): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User   $user
     * @param  Product  $model
     * @return void
     */
    public function forceDelete(User $user, Product $model): void
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
        if ($user->can('product destroy-many')) {
            return true;
        }
        return false;
    }
}
