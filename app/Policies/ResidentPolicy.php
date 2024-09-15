<?php

namespace App\Policies;

use App\Models\Resident;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ResidentPolicy
{

    public function before (User $user, string $ability) : bool|null
    {
        if ($user->role === 'super_admin') {
            return true;
        }

        return null;
    }
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): void
    {

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Resident $resident): Response
    {
        return in_array($user->role, ['captain', 'secretary', 'resident_admin', 'resident_encoder'])
                ? Response::allow()
                : Response::denyWithStatus(403);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): Response
    {
        return in_array($user->role, ['resident_admin', 'resident_encoder'])
                ? Response::allow()
                : Response::denyWithStatus(403);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Resident $resident): Response
    {
        return in_array($user->role, ['resident_admin', 'resident_encoder'])
                ? Response::allow()
                : Response::denyWithStatus(403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Resident $resident): void
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Resident $resident): void
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Resident $resident): void
    {
        //
    }
}
