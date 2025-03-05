<?php

namespace App\Http\Controllers\AppointmentsGroup;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CancelAppointmentController extends Controller
{
    public function cancel_appointment_list(Request $request)
    {
        if ($request->ajax()) {
            $branchId = Auth::user()->branch_id;
            $model = Appointment::with(['users' => function ($query) {
                $query->select('id', 'firstname');
            }, 'branch'])
                ->where('status', 'cancelled')
                ->when(Auth::user()->status === 0, function ($query) {
                    return $query;
                }, function ($query) use ($branchId) {
                    return  $query->where('branch_id', $branchId);
                });

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('name', function ($appointment) {
                    $firstname = $appointment->users  ? $appointment->users->firstname : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $firstname;
                })
                ->addColumn('branch_name', function ($appointment) {
                    $branches = $appointment->branch ? $appointment->branch->name : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $branches;
                })
                ->filter(function ($query) use ($request) {
                    $query->when(isset($request->from_date) && isset($request->to_date), function ($query) use ($request) {
                        $query->whereDate('appointment_date', '>=', $request->from_date)
                            ->whereDate('appointment_date', '<=', $request->to_date);
                    });
                })

                ->addColumn('pending', function ($row) {

                    $btn = '<span class="text-danger fw-bold">Cancelled </span>';
                    return $btn;
                })
                ->rawColumns(['pending', 'name'])
                ->make(true);
        }
        return view('admin.appointment.cancel_appointment');
    }
}
