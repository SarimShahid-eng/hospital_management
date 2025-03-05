<?php

namespace App\Policies;

use App\Models\LabortaryAppointment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LabortaryAppointmentPolicy
{

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, LabortaryAppointment $labortaryAppointment): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $labortaryAppointment->branch_id ? Response::allow() : Response::deny('Do not have rights to make a change');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LabortaryAppointment $labortaryAppointment): bool
    {
        //
    }
}
