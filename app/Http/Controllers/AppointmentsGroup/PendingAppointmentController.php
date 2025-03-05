<?php

namespace App\Http\Controllers\AppointmentsGroup;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PendingAppointmentController extends Controller
{

    public function pending_appointment(Request $request)
    {
        $data = [
            'title' => 'Pending Appointment'
        ];
        if ($request->ajax()) {

            $model = Appointment::with(['users' => function ($query) {
                $query->select('id', 'firstname', 'branch_id');
            }])->select('id', 'mr_no', 'branch_id', 'user_id', 'status', 'appointment_date')
                ->when(Auth::user()->status === 0, function ($query) {
                    return $query->where('status', 'pending');
                }, function ($query) {
                    return $query->where('branch_id', Auth::user()->branch_id)
                        ->where('status', 'pending');
                });
            return DataTables::eloquent($model)
                ->addIndexColumn() //
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
                    $btn = '<a href="#" data-id="' . $row->id . '" class="pending btn btn-danger">Pending</a>';
                    return $btn;
                })
                ->addColumn('payment', function ($row) {
                    $btn =  " <a href=" . route(admin_route('appointment.payment_receipt'), ['id' => $row->id]) . " class='btn btn-primary'><i class='fa-solid fa-receipt'></i></a>";
                    return $btn;
                })
                ->rawColumns(['pending', 'name', 'payment'])
                ->make(true);
        }
        return view('admin.appointment.pending_appointment', $data);
    }
    public function change_status(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $appointment = Appointment::find($request->id);
        Gate::authorize('update', $appointment);

        $appointment->status = 'active';
        $appointment->save();
        return response()->json([
            'success' => 'Appointment Activated !',
            'reload' => true
        ]);
    }
}
