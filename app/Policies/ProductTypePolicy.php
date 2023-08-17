<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProductType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductTypePolicy
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
        if ($user->can('product_type index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  ProductType  $model
     * @return bool
     */
    public function view(User $user, ProductType $model): bool
    {
        if ($user->can('product_type show')) {
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
        if ($user->can('product_type create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ProductType  $model
     * @return bool
     */
    public function update(User $user, ProductType $model): bool
    {
        if ($user->can('product_type update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User   $user
     * @param  ProductType  $model
     * @return bool
     */
    public function delete(User $user, ProductType $model): bool
    {
        if ($user->can('product_type delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User   $user
     * @param  ProductType  $model
     * @return void
     */
    public function restore(User $user, ProductType $model): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User   $user
     * @param  ProductType  $model
     * @return void
     */
    public function forceDelete(User $user, ProductType $model): void
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
        if ($user->can('product_type destroy-many')) {
            return true;
        }
        return false;
    }
}
