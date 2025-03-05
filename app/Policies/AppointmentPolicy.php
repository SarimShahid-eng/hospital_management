<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Appointment;
use App\Models\Branch;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class AppointmentPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view($user, array $guards, $branch)
    {
        // dd($guards);

    }

    /**
     * Determine whether the user can create models.
     */
    /** only allow user whose branch_id match current branch_id */
    // public function create($user, $branch, ...$guards): bool
    // {
    //     if (!$user) {
    //         return false;
    //     }
    //     foreach ($guards as $guard) {
    //         if (Auth::guard($guard)->check()) {
    //             return $user->branch_id === intval($branch);
    //         }
    //     }
    //     return false;
    // }
    /**
     * Determine whether the user can update the model.
     */
    public function update($user, Appointment $appointment): Response
    {
        if (Auth::user()->status === 0) {
            return Response::allow();
        }
        // if(Auth::guard('doctor')){

        // }
        if ((Auth::guard('admin')->check() && $user->status === 1) || Auth::guard('receptionist')->check()) {
            return Auth::user()->branch_id === $appointment->branch_id ? Response::allow() : Response::deny('Do not have rights to make a change');
        } else if (Auth::guard('doctor')->check()) {
            // Ensure the doctor is associated with the appointment details
            $isDoctorAuthorized = $appointment->appointment_details()
                ->where('doctor_id', $user->id)
                ->exists();

            return $isDoctorAuthorized
                ? Response::allow()
                : Response::deny('Do not have rights to make a change');
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Appointment $appointment): bool
    {
        //
    }
}
