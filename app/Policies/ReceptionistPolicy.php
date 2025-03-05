<?php

namespace App\Policies;

use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReceptionistPolicy
{

    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Receptionist $receptionist): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $receptionist->branch_id ? Response::allow() : Response::denyAsNotFound();
    }


    public function delete($user, Receptionist $receptionist): bool
    {
        if ($user->status === 0) {
            return true;
        }
        return $user->branch_id === $receptionist->branch_id;
    }
}
