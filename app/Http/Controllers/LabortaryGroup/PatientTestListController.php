<?php

namespace App\Http\Controllers\LabortaryGroup;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LabortaryAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class PatientTestListController extends Controller
{
    function patient_test(Request $request)
    {
        $data = [
            'title' => 'Patient Test List'
        ];
        if ($request->ajax()) {
            $branchId = Auth::user()->branch_id;
            $model = LabortaryAppointment::with(['users', 'branch'])->where('status', '!=', 'cancelled')
                ->when(
                    Auth::user()->status === 0,
                    function ($query) {
                        return $query;
                    },
                    function ($query) use ($branchId) {
                        return $query->where('branch_id', $branchId);
                    }
                );
            return DataTables::eloquent($model)
                ->addIndexColumn() //
                ->addColumn('name', function ($appointment) {
                    $firstname = $appointment->users->firstname;
                    $firstname = $firstname  ? $firstname : 'N/A';
                    return  $firstname;
                })
                ->addColumn('branch_name', function ($appointment) {
                    $branches = $appointment->branch->name;
                    $branches = $branches ? $branches : 'N/A';
                    return  $branches;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('labortary.patient_test_edit'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('labortary.patient_test_cancel'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('payment_receipt', function ($row) {
                    $btn = " <a href=" . route(admin_route('labortary.patient_payment_receipt'), ['id' => $row->id]) . " class='btn btn-primary'><i class='fa-solid fa-receipt'></i></a>";
                    return $btn;
                })
                ->filter(function ($query) use ($request) {
                    $query->when(isset($request->from_date) && isset($request->to_date), function ($query) use ($request) {
                        $query->whereDate('appointment_date', '>=', $request->from_date)
                            ->whereDate('appointment_date', '<=', $request->to_date);
                    });
                    $query->when((isset($request->dateFilter) && $request->dateFilter !== "All"), function ($query) use ($request) {
                        if ($request->dateFilter == "Today") {
                            $today = Carbon::now('Asia/Karachi')->format('Y-m-d');
                            $query->whereDate('appointment_date', $today);
                        } else if ($request->dateFilter == "Yesterday") {
                            $yesterday = Carbon::yesterday()->format('Y-m-d');
                            $query->whereDate('appointment_date', $yesterday);
                        } else if ($request->dateFilter == "This Week") {
                            $startOfWeek = Carbon::now('Asia/Karachi')->startOfWeek()->format('Y-m-d');
                            // dd($startOfWeek);
                            $query->whereDate('appointment_date', '>=', $startOfWeek);
                        } elseif ($request->dateFilter == 'This Month') {
                            $startOfMonth = Carbon::now('Asia/Karachi')->startOfMonth()->format('Y-m-d');
                            $endOfMonth = Carbon::now('Asia/Karachi')->endOfMonth()->format('Y-m-d');
                            $query->whereBetween('appointment_date', [
                                $startOfMonth,
                                $endOfMonth
                            ]);
                        }
                    });
                    $query->when(isset($request->user_id), function ($query)  use ($request) {
                        $query->where('user_id', $request->user_id);
                    });
                })
                ->rawColumns(['action', 'result', 'payment_receipt'])
                ->make(true);
        }
        return view('admin.labortary.patient_test_manage.patient_list', $data);
    }
    function patientTestEdit($id)
    {
        $user = null;
        if ($id) {
            $branches = Branch::all();
            $lab_appointments = LabortaryAppointment::with(['branch', 'lab_details', 'users'])->findorFail($id);
            Gate::authorize('patient-test-list', $lab_appointments);
            $user = User::find($lab_appointments->user_id);
            return view('admin.appointment.patient',  compact('lab_appointments',  'branches'));
        } else {
            return 404;
        }
    }
    function patientTestCancel($id)
    {
        $lab_appointment = LabortaryAppointment::findorFail($id);
        Gate::authorize('patient-test-list', $lab_appointment);
        $lab_appointment->status = 'cancelled';
        $lab_appointment->save();
        return response()->json([
            'success' => 'Appointment Cancelled Successfully !',
            'reload' => true
        ]);
    }
    function patientPaymentReceipt($id)
    {
        $lab_appointments = LabortaryAppointment::with(['users', 'lab_details'])->findorFail($id);
        Gate::authorize('patient-test-list', $lab_appointments);
        return view('admin.labortary.patient_test_manage.payment_recepit', compact('lab_appointments'));
    }
    function get_labappointment(Request $request)
    {
        // dd($request->all());
        $number = $request->number;
        $appointment = null;
        if (Str::contains($number, '-')) {
            $appointment = LabortaryAppointment::with(['users', 'branch'])
                ->where('mr_no', 'LIKE', '%' . $number . '%')
                ->selectRaw('user_id,branch_id,mr_no,
            SUM(main_total) as total_without_discount,
            SUM(total) as total_with_discount,
            SUM(total_discount) as total_discount')
                ->groupBy(['user_id', 'mr_no', 'branch_id'])
                ->select('user_id', 'mr_no', 'branch_id')->get();
            // dd($appointment);
        }
        // dd($appointment);
        // $user = null;
        // if ($number >= 10 && !Str::contains($number, '-')) {
        //     $user = User::where('phone_no', 'LIKE', '%' . $number . '%')
        //         ->with(['labappointments' => function ($query) {
        //             $query->selectRaw('user_id, mr_no,
        //             SUM(main_total) as total_without_discount,
        //             SUM(total) as total_with_discount,
        //             SUM(remaining) as total_remaining,
        //             SUM(advance) as total_advance,
        //             SUM(total_discount) as total_discount')
        //                 ->groupBy('user_id', 'mr_no');
        //         }, 'branch'])
        //         ->latest()
        //         ->firstorFail();
        //     $user = User::where('phone_no', 'LIKE', '%' . $number . '%')
        //         ->with(['labappointments' => function ($query) {
        //             $query->selectRaw('user_id, mr_no')
        //                 ->groupBy('user_id', 'mr_no');
        //         }, 'branch'])
        //         ->latest()
        //         ->firstorFail();
        // }
        return response()->json([
            // 'users' => $user,
            'appointment' => $appointment
        ]);
        // return response()->json([
        //     'success' => 'Appointment Cancelled Successfully !',
        //     'reload' => true
        // ]);
        // return view('admin.labortart.patient_test_manage');
    }
}
