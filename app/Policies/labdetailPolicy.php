<?php

namespace App\Policies;

use App\Models\User;
use App\Models\labdetail;
use Illuminate\Auth\Access\Response;

class labdetailPolicy
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
    public function update($user, labdetail $labdetail): Response
    {
        if ($user->status === 0) {
            return Response::allow();
        }
        return $user->branch_id === $labdetail->lab_app->branch_id ? Response::allow() : Response::deny('Do not have rights to make a change');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, labdetail $labdetail): bool
    {
        //
    }
}
