<?php

namespace App\Policies;

use App\Models\Diligenciamiento;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DiligenciamientoPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasRole(['Superadmin', 'Admin']);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Diligenciamiento $diligenciamiento): bool
    {
        return $user->hasRole(['Superadmin', 'Admin']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('crear diligencimiento');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Diligenciamiento $diligenciamiento): bool
    {
        return $user->can('actualizar diligencimiento');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Diligenciamiento $diligenciamiento): bool
    {
        return $user->can('eliminar diligencimiento');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Diligenciamiento $diligenciamiento): bool
    {
        return $user->hasRole(['Superadmin', 'Admin']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Diligenciamiento $diligenciamiento): bool
    {
        return $user->hasRole(['Superadmin', 'Admin']);
    }
}
