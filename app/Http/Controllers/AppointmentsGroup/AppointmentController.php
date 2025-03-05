<?php

namespace App\Http\Controllers\AppointmentsGroup;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use App\Models\Doctor;
use App\Models\labdetail;


use App\Models\Labortary;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Helpers\FileUploads;
use App\Models\DoctorDetail;
use Illuminate\Http\Request;
use App\Models\AppointmentDetail;
use App\Http\Controllers\Controller;
use App\Models\LabortaryAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    public function index(Request $request, $id = null)
    {

        $data = [
            'title' => 'Patient Registration'
        ];
        $appointment_details = null;
        $user = null;
        $appointment = null;
        if ($id !== null) {
            $appointment = Appointment::with(['appointment_details', 'appointment_details.doctors', 'users'])->where('status', 'active')->find($id);
            // on pending it will show unauthorized action
            Gate::authorize('update', $appointment);
        }
        $branches = Branch::all();

        $userStatus = Auth::user()->status;
        $branchId = Auth::user()->branch_id;

        if ($request->ajax()) {
            $count = User::count();
            if ($count === 0) {
                $id = '01';
            } else {
                $id = '0' . ++$count;
            }
            return  response()->json([
                'get_mr_no' => "00-00-00-$id"
            ]);
        }
        return view('admin.appointment.patient', $data, compact('appointment', 'branches', 'appointment_details', 'user'));
    }

    public function create(AppointmentRequest $request)
    {
        $updateId = $request->input('update_id');
        $Input = $request->all();
        $userInfoArray = [
            'firstname' => $Input['firstname'],
            'username' => $Input['username'],
            'gender' => $Input['gender'],
            // 'age' => $Input['age'],
            'phone_no' => $Input['phone_no'],
            'dob' => $Input['dob'],
            'cnic_no' => $Input['cnic_no'],
            'address' => $Input['address'],
            'branch_id' => $Input['branch_id'],
        ];
        if ($request->hasFile('image')) {
            $destination = '/images/patient_profile';
            $file = $request->file('image');
            $image = FileUploads::upload('image', $file, $destination);
            if (is_array($image)) {
                return response()->json($image);
            }
            $userInfoArray['image'] = $image;
        }
        // if (!empty($Input['password'])) {
        //     $userInfoArray['password'] = Hash::make($Input['password']);
        // }

        // check if incomig mr_no record exist on appointment or in lab_appointment check relation if user exist update him/her
        $appointmentSearchUser =  Appointment::where('mr_no', $Input['mr_no'])->with('users')->first();
        $labappointmentSearchUser =  LabortaryAppointment::where('mr_no', $Input['mr_no'])->with('users')->first();
        if ($appointmentSearchUser !== null && $appointmentSearchUser->users) {
            // branch will not be updated It will remain first one
            unset($userInfoArray['branch_id']);
            $user = User::find($appointmentSearchUser->user_id);
            $user->update($userInfoArray);
        } elseif ($labappointmentSearchUser !== null && $labappointmentSearchUser->users) {
            unset($userInfoArray['branch_id']);
            $user = User::find($labappointmentSearchUser->user_id);
            $user->update($userInfoArray);
        } else {
            $user =  User::create($userInfoArray);
        }

        $Input['user_id'] = $user->id;
        if ($updateId == null) {
            $txt = 'Added !';
            $routeName = admin_route('appointment.index');
            $redirect = route($routeName);
        } else {
            $routeName = admin_route('appointment.list');
            $txt = 'Updated !';
            $redirect = route($routeName);
        }
        if ($updateId || !$updateId) {
            $appointment = $Input['labortaryOrAppointment'] == 'appointment' ? Appointment::updateOrCreate(
                ['id' => $updateId],
                $Input
            ) : null;
            $labortarty_app = $Input['labortaryOrAppointment'] == 'labortary' ? LabortaryAppointment::updateOrCreate(
                ['id' => $updateId],
                $Input
            ) : null;

            if ($Input['service_name'][0] == 'Consult') {
                $data = array();
                foreach ($Input['doctor_id'] as $key => $doctor_id) {
                    $data[] = [
                        'appointment_id' => $appointment['id'],
                        'doctor_id' => $Input['doctor_id'][$key],
                        'amount' => $Input['amount'][$key],
                        'discount' => $Input['discount'][$key] ?? 0,
                        'referring_doctor' => $Input['referring_doctor'][$key],
                        'que_no' => $Input['que_no'][$key],
                    ];
                    break; // Exit the loop after the first iteration
                }
                if ($updateId) {
                    AppointmentDetail::where('appointment_id', $appointment['id'])->delete();
                }
                AppointmentDetail::insert($data);
            }
            if ($Input['service_name'][0] == 'Labortary') {
                foreach ($Input['doctor_id'] as $key => $doctor_id) {
                    $lab[] = [
                        'appointment_id' => $labortarty_app['id'],
                        'amount' => $Input['amount'][$key] ?? 0,
                        'lab_test_id' => $Input['doctor_id'][$key],
                        'discount' => $Input['discount'][$key] ?? 0,
                    ];
                }
                if ($updateId) {
                    labdetail::where('appointment_id', $labortarty_app['id'])->delete();
                }
                labdetail::insert($lab);
            }

            $appointment !== null ? Appointment::findorFail($appointment['id']) : LabortaryAppointment::findorFail($labortarty_app['id']);
        }
        return response()->json([
            'success' => 'Appointment has been ' . $txt,
            'redirect' => $redirect
        ]);
    }
    public function edit(Request $request)
    {
        if ($request->currentId) {
            $data = User::find($request->currentId);
            return response()->json($data);
        }
    }
    public function cancel_appointment($id)
    {
        $appointment = Appointment::findorFail($id);
        Gate::authorize('update', $appointment);
        $appointment->status = 'cancelled';
        $appointment->save();
        $routeName = admin_route('appointment.list');

        return response()->json([
            'success' => 'Appointment Cancelled Successfully !',
            'redirect' => route($routeName)
        ]);
    }
    public function appointmentQuery()
    {
        $branchId = Auth::user()->branch_id;
        $user = Auth::user();
        $model =   Appointment::with(['users' => function ($query) {
            $query->select('firstname', 'id', 'branch_id');
        }, 'branch' => function ($query) {
            $query->select('id', 'name');
        }])
            ->select('id', 'appointment_date', 'status', 'user_id', 'branch_id')
            ->where('status', 'active')
            ->when(Auth::guard('admin')->check(), function ($query) use ($branchId) {
                return Auth::user()->status === 0
                    ? $query
                    : $query->where('branch_id', $branchId);
            })
            ->when(Auth::guard('doctor')->check(), function ($query) {
                return $query->whereHas('appointment_details', function ($query) {
                    $query->where('doctor_id', Auth::guard('doctor')->user()->id);
                });
                // return $query->where('doctor_id', Auth::guard('doctor')->user()->id);
            })
            ->when(Auth::guard('web')->check(), function ($query) {
                return $query->where('patient_id', Auth::guard('web')->user()->id);
            })
            ->when(Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
                return $query->where('branch_id', $branchId);
            });

        return $model;
    }

    public function list(Request $request)
    {
        $data = [
            'title' => 'Active Appointments'
        ];
        $model = $this->appointmentQuery();

        if ($request->ajax()) {
            $model = $this->appointmentQuery();
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('name', function ($appointment) {
                    $firstname = $appointment->users->firstname ? $appointment->users->firstname : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $firstname;
                })
                ->addColumn('branch_name', function ($appointment) {
                    $branches =  $appointment->branch ? $appointment->branch->name : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $branches;
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
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('appointment.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('appointment.cancel_appointment'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('payment', function ($row) {
                    $btn =  " <a href=" . route(admin_route('appointment.payment_receipt'), ['id' => $row->id]) . " class='btn btn-primary'><i class='fa-solid fa-receipt'></i></a>";
                    return $btn;
                })
                ->rawColumns(['action', 'name', 'payment'])
                ->make(true);
        }
        return view('admin.appointment.list', $data);
    }
    public function get_services(Request $request)
    {

        if ($request->label == 'Doctors') {
            $dr_data = DoctorDetail::where('doctor_id', $request->dr_id)->pluck('consultancy_fee')->firstorFail();
        }
        if ($request->label == 'Labortary') {
            $dr_data = Labortary::where('id', $request->dr_id)->pluck('fees')->firstorFail();
            $dr_data = intval($dr_data);
        }
        return  response()->json([
            'doctor_fee' => $dr_data
        ]);
    }

    public function get_consult_services(Request $request)
    {
        // $guard = ['receptionist', 'admin'];
        $service = $request->input('selected_service_id');
        $branch = $request->input('branch');
        // Check which guards have permission and only allow branch user to add
        Gate::authorize('userAuthority', [$branch]);

        if ($service == 'appointment' && $branch) {
            $data = Doctor::where('branch_id', $branch)->get();
            $text = 'Doctors';
        }
        // labortary get labortary_test
        if ($service == 'labortary') {
            $data = Labortary::all();
            $text = 'Labortary';
        }
        return response()->json([
            'user_data' => $data,
            'text' => $text
        ]);
    }
    function payment_receipt($id)
    {
        $appointments = Appointment::with(['users' => function ($query) {
            $query->select('id', 'firstname',  'gender', 'phone_no', 'address', 'username');
        }, 'doctors' => function ($query) {
            $query->select('id', 'firstname');
        }, 'appointment_details'])->whereIn('status', ['active', 'pending'])->findorFail($id);
        Gate::authorize('update', $appointments);
        return view('admin.appointment.payment_receipt', compact('appointments'));
    }


    function get_appointments(Request $request)
    {
        $number = $request->number;
        $searchType = $request->searchType;
        $appointment = null;
        if (Str::contains($number, '-') && $searchType === 'mr_no') {
            $appointment = Appointment::with(['users', 'branch'])
                ->where('mr_no', 'LIKE', '%' . $number . '%')
                ->selectRaw('user_id,branch_id,mr_no,
            SUM(main_total) as total_without_discount,
            SUM(total) as total_with_discount,
            SUM(total_discount) as total_discount')
                ->groupBy(['user_id', 'mr_no', 'branch_id'])
                ->get();
            if ($appointment->isEmpty()) {
                $appointment = LabortaryAppointment::with(['users', 'branch'])
                    ->where('mr_no', 'LIKE', '%' . $number . '%')
                    ->selectRaw('user_id,branch_id,mr_no,
            SUM(main_total) as total_without_discount,
            SUM(total) as total_with_discount,
            SUM(total_discount) as total_discount')
                    ->groupBy(['user_id', 'mr_no', 'branch_id'])
                    ->get();
            }
        }
        $user = null;
        if ($number >= 10 && !Str::contains($number, '-') && $searchType === 'phone_no') {
            $user = User::where('phone_no', 'LIKE', '%' . $number . '%')
                ->with(['appointments' => function ($query) {
                    $query->selectRaw('user_id,branch_id,mr_no,
                    SUM(main_total) as total_without_discount,
                    SUM(total) as total_with_discount,
                    SUM(total_discount) as total_discount')
                        ->groupBy('user_id', 'mr_no', 'branch_id');
                }, 'branch'])
                ->get();
        }
        return response()->json([
            'users' => $user,
            'appointment' => $appointment
        ]);
    }
    public function getAppointmentPatient(Request $request)
    {
        $id = $request->input('id');
        if ($id) {
            $user = User::with(['appointments' => function ($query) {
                $query->selectRaw('user_id, mr_no,
                    SUM(main_total) as total_without_discount,
                    SUM(total) as total_with_discount,
                    SUM(total_discount) as total_discount')
                    ->groupBy('user_id', 'mr_no');
            }, 'branch'])->find($id);
            if ($user->appointments->isEmpty()) {
                $user = User::with([
                    'labappointments' => function ($query) {
                        $query->selectRaw('user_id, mr_no,
                            SUM(main_total) as total_without_discount,
                            SUM(total) as total_with_discount,
                            SUM(total_discount) as total_discount')
                            ->groupBy('user_id', 'mr_no');
                    },
                    'branch',
                ])->findOrFail($id);
            }
            return response()->json([
                'users' => $user
            ]);
        }
    }
}
