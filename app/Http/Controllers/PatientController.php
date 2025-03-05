<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\AppointmentDetail;
use App\Models\labdetail;
use App\Models\LabortaryAppointment;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PatientController extends Controller
{
    function patients(Request $request)
    {
        // grab users from users table
        // seperate users branch_wise for admin and receptionist
        // load users from appointment_detail when user is doctor
        $data = [
            'title' => 'All Patients'
        ];
        $branchId = Auth::user()->branch_id;
        $isAdminOrReceptionist = Auth::guard('admin')->check() || Auth::guard('receptionist')->check();
        // This modal only for doctor
        if (Auth::guard('doctor')->check()) {
            $model = AppointmentDetail::with('appointment')
                ->select('doctor_id', \DB::raw('MAX(appointment_id) as latest_appointment_id'))
                ->groupBy('doctor_id')

                ->when(Auth::guard('doctor')->check(), function ($query) {
                    $query->where('doctor_id', Auth::user()->id);
                })
                ->when($isAdminOrReceptionist, function ($query) use ($branchId) {
                    return Auth::user()->status === 0 && Auth::user()->status !== null
                        ? $query
                        : $query->whereRelation('appointment', 'branch_id', $branchId);
                })
                ->get();
            $model = AppointmentDetail::with(['appointment', 'doctors', 'appointment.users'])
                ->whereIn('appointment_id', $model->pluck('latest_appointment_id'))
                ->select('id', 'appointment_id');
        }
        if ($isAdminOrReceptionist) {
            // firstname ,mr ,branch
            $model = User::with(['get_appointment', 'get_lab_appointment', 'branch'])
                ->when($isAdminOrReceptionist, function ($query) use ($branchId) {
                    return Auth::user()->status === 0 && Auth::user()->status !== null
                        ? $query
                        : $query->where('branch_id', $branchId);
                })
                ->select('id', 'firstname', 'branch_id');
        }

        if ($request->ajax()) {

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('customColumn1', function ($app_detail) use ($isAdminOrReceptionist) {

                    if ($isAdminOrReceptionist) {

                        return $app_detail->firstname ?  "<a class='text-black' href='" . route('admin.patients.patient_details', [
                            'mr_no' => $app_detail->get_appointment->mr_no ?? $app_detail->get_lab_appointment->mr_no,
                            'id' => $app_detail->id
                        ]) . "'>" . $app_detail->firstname . "</a>"  : 'N/A';
                    } else {
                        return $app_detail->appointment->users ?  "<a class='text-black' href=" . route(
                            admin_route(
                                'patients.patient_details'
                            ),
                            [
                                'mr_no' => $app_detail->appointment->mr_no ?? $app_detail->get_lab_appointment->mr_no,
                                'id' => $app_detail->appointment->id ?? $app_detail->get_lab_appointment->id
                            ]
                        ) . ">" .  $app_detail->appointment->users->firstname . "</a>" : 'N/A';
                    }
                })
                ->addColumn('customColumn2', function ($app_detail) use ($isAdminOrReceptionist) {

                    if ($isAdminOrReceptionist) {
                        return $app_detail->get_appointment->mr_no ?? $app_detail->get_lab_appointment->mr_no ?? 'N/A';
                    } else {
                        return $app_detail->appointment ? $app_detail->appointment->mr_no : 'N/A';
                    }
                })
                ->addColumn('customColumn3', function ($app_detail) use ($isAdminOrReceptionist) {
                    if ($isAdminOrReceptionist) {
                        return $app_detail->branch_id ? $app_detail->branch->name : 'N/A';
                    } else {
                        return $app_detail->appointment ? $app_detail->appointment->branch->name : 'N/A';
                    }
                })

                ->rawColumns(['customColumn1', 'app_detail', 'customColumn3'])
                ->make(true);
        }
        return view('admin.patients.all_patients', $data);
    }
    function patient_details($mr_no, $id)
    {
        // dd($id);
        $user_appointments = Appointment::with(['users', 'appointment_details', 'appointment_details.doctors'])->where('mr_no', $mr_no)
            // ->where('')
            ->select('id', 'mr_no', 'appointment_date', 'user_id', 'branch_id')->get();
        $lab_details = labdetail::with(['lab_app', 'lab_app.users'])
            ->whereHas('lab_app', function ($query) use ($mr_no) {
                $query->where('mr_no', $mr_no);
            })
            ->where('status', 'completed')
            ->limit(10)
            ->get();
        $user = User::find($id);
        $data = [
            'title' => 'Patient Details'
        ];
        return view('admin.patients.patient_details', compact('user_appointments', 'mr_no',  'lab_details', 'user'), $data);
    }
}
