<?php

namespace App\Policies;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class DoctorPolicy
{
    public function create(User $user): bool
    {
        //
    }
    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Doctor $doctor): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $doctor->branch_id ? Response::allow() : Response::denyAsNotFound();
    }
    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Doctor $doctor): bool
    {
        //
    }
}
