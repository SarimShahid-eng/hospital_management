<?php

namespace App\Policies;

use App\Models\Labortarist;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LabortaristPolicy
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
    public function update($user, Labortarist $labortarist): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $labortarist->branch_id ? Response::allow() : Response::denyAsNotFound();
    }
}
