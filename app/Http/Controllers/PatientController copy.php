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
        $data = [
            'title' => 'All Patients'
        ];
        $branchId = Auth::user()->branch_id;

        // group by doctor_id and latest id get
        $model = AppointmentDetail::with('appointment')
            ->select('doctor_id', \DB::raw('MAX(appointment_id) as latest_appointment_id'))
            ->groupBy('doctor_id')

            ->when(Auth::guard('doctor')->check(), function ($query) {
                $query->where('doctor_id', Auth::user()->id);
            })
            ->when(Auth::guard('admin')->check() ||  Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
                return Auth::user()->status === 0 && Auth::user()->status !== null
                    ? $query
                    : $query->whereRelation('appointment', 'branch_id', $branchId);
            })
            ->get();

        // Now load relationships for the grouped records and get the latest record
        $model = AppointmentDetail::with(['appointment', 'doctors', 'appointment.users'])
            ->whereIn('appointment_id', $model->pluck('latest_appointment_id'))
            ->select('id', 'appointment_id');
        if ($request->ajax()) {

            return DataTables::eloquent($model)
                ->addIndexColumn()
                // <a href="{{}}"></a>
                ->addColumn('firstname', function ($app_detail) {
                    return $app_detail->appointment->users ?  "<a class='text-black' href=" . route('admin.patients.patient_details', $app_detail->appointment->mr_no) . ">" .  $app_detail->appointment->users->firstname . "</a>" : 'N/A';
                })
                ->addColumn('mr_no', function ($app_detail) {
                    return $app_detail->appointment ? $app_detail->appointment->mr_no : 'N/A';
                })
                ->addColumn('branch', function ($app_detail) {
                    return $app_detail->appointment ? $app_detail->appointment->branch->name : 'N/A';
                })

                ->rawColumns(['firstname', 'branch', 'mr_no'])
                ->make(true);
        }
        return view('admin.patients.all_patients', $data);
    }
    function patient_details($mr_no)
    {
        $user_appointments = Appointment::with(['users', 'get_appointment_details', 'appointment_details.doctors'])->where('mr_no', $mr_no)->select('id', 'mr_no', 'appointment_date', 'user_id', 'branch_id')->get();
        $lab_details = labdetail::with(['lab_app', 'lab_app.users'])
            ->whereHas('lab_app', function ($query) use ($mr_no) {
                $query->where('mr_no', $mr_no);
            })
            ->limit(10)
            ->get();
        // dd($lab_details);
        $data = [
            'title' => 'Patient Details'
        ];
        return view('admin.patients.patient_details', compact('user_appointments', 'lab_details'), $data);
    }
}
