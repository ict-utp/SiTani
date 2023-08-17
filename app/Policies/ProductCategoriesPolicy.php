<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProductCategories;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoriesPolicy
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
        if ($user->can('product_category index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User $user
     * @param  ProductCategories  $model
     * @return bool
     */
    public function view(User $user, ProductCategories $model): bool
    {
        if ($user->can('product_category show')) {
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
        if ($user->can('product_category create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ProductCategories  $model
     * @return bool
     */
    public function update(User $user, ProductCategories $model): bool
    {
        if ($user->can('product_category update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User   $user
     * @param  ProductCategories  $model
     * @return bool
     */
    public function delete(User $user, ProductCategories $model): bool
    {
        if ($user->can('product_category delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  User   $user
     * @param  ProductCategories  $model
     * @return void
     */
    public function restore(User $user, ProductCategories $model): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  User   $user
     * @param  ProductCategories  $model
     * @return void
     */
    public function forceDelete(User $user, ProductCategories $model): void
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
        if ($user->can('product_category destroy-many')) {
            return true;
        }
        return false;
    }
}
