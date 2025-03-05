<?php

namespace App\Http\Controllers\LabortaryGroup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LabortaryAppointment;
use App\Models\labortary_appointment;
use Yajra\DataTables\Facades\DataTables;

class CancelPatientTestController extends Controller
{
    public function cancel_patient_test(Request $request)
    {
        if ($request->ajax()) {
            $model = LabortaryAppointment::with(['users', 'branch'])->where('status', '=', 'cancelled');
            return DataTables::eloquent($model)
                ->addIndexColumn() //
                ->addColumn('name', function ($appointment) {
                    $firstname = $appointment->users  ? $appointment->users->firstname : 'N/A';
                    return  $firstname;
                })
                ->addColumn('branch_name', function ($appointment) {
                    $branches = $appointment->branch ? $appointment->branch->name : 'N/A';
                    return  $branches;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('labortary.patient_test_cancel'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('labortary.patient_test_cancel'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    $btn = "<span class='text-danger fw-bold'>Cancelled </span> ";
                    return $btn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('admin.labortary.patient_test_manage.cancel_patient_test');
    }
    //
}
