<?php

namespace App\Policies;

use App\Models\Authorization\User;
use App\Models\Employer;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmployerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_employer');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function view(User $user, Employer $employer): bool
    {
        return $user->can('view_employer');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_employer');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function update(User $user, Employer $employer): bool
    {
        return $user->can('update_employer');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function delete(User $user, Employer $employer): bool
    {
        return $user->can('delete_employer');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_employer');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function forceDelete(User $user, Employer $employer): bool
    {
        return $user->can('force_delete_employer');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_employer');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function restore(User $user, Employer $employer): bool
    {
        return $user->can('restore_employer');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_employer');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\Authorization\User  $user
     * @param  \App\Models\Employer  $employer
     * @return bool
     */
    public function replicate(User $user, Employer $employer): bool
    {
        return $user->can('{{ Replicate }}');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\Authorization\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('{{ Reorder }}');
    }

}
