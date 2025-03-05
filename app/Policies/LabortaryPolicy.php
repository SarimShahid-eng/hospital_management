<?php

namespace App\Policies;

use App\Models\Labortary;
use App\Models\LabortaryAppointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LabortaryPolicy
{


    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Labortary $labortary): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $labortary->branch_id ? Response::allow() : Response::denyAsNotFound();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Labortary $labortary): bool
    {
        //
    }
}
