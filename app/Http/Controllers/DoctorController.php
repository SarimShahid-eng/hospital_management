<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Doctor;
use App\Helpers\FileUploads;
use App\Models\DoctorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\DoctorFormRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{
    function index($id = null)
    {
        $data = [
            'title' => 'Add Doctor'
        ];
        $doctor_details = null;
        if ($id !== null) {
            $doctor_details = DoctorDetail::where('doctor_id', $id)->firstorFail();
            $id = Doctor::find($id);
            Gate::authorize('update', $id);
        }
        $branches = Branch::all();
        return view('admin.doctor.index', $data, compact('branches', 'id', 'doctor_details'));
    }
    public function create(DoctorFormRequest $request)
    {
        $updateId = $request->input('update_id');
        $Input = $request->all();
        if ($request->hasFile('image')) {
            $destination = '/images/doctor_profile';
            $file = $request->file('image');
            $image = FileUploads::upload('image', $file, $destination);
            if (is_array($image)) {
                return response()->json($image);
            }
            $Input['image'] = $image;
        }

        if ($updateId == null) {
            $txt = 'Added';
            $routeName = admin_route('doctor.index');
            $redirect = route($routeName);
        } else {
            $routeName = admin_route('doctor.list');
            $txt = 'Updated';
            $redirect = route($routeName);
        }
        if (isset($Input['password'])) {
            $Input['password'] = Hash::make($Input['password']);
        } else {
            unset($Input['password']);
        }

        $doctor =  Doctor::updateOrCreate(
            ['id' => $updateId],
            $Input
        );
        $Input['doctor_id'] = $doctor->id;
        DoctorDetail::updateOrCreate(
            ['id' => $updateId],
            $Input
        );

        return response()->json([
            'success' => 'Doctor ' . $txt . ' Successfully!',
            'redirect' => route($routeName)
        ]);
    }
    public function edit(Request $request)
    {
        if ($request->currentId) {
            $data = Doctor::find($request->currentId);
            return response()->json($data);
        }
    }
    // public function destroy($id)
    // {
    //     $User = Doctor::find($id);
    //     $routeName = admin_route('doctor.list');

    //     $User->delete();
    //     return response()->json([
    //         'success' => 'Doctor Deleted Successfully !',
    //         'redirect' => route($routeName)
    //     ]);
    // }
    public function list(Request $request)
    {
        $branchId = Auth::user()->branch_id;
        $data = [

            'title' => 'Doctor List'
        ];
        if ($request->ajax()) {
            $model = Doctor::with(['doctor_details' => function ($query) {
                $query->select('id', 'doctor_id', 'timing_from', 'timing_to', 'consultancy_fee', 'contact1');
            }])
                ->when(Auth::user()->status === 0, function ($query) {
                    return $query;
                }, function ($query) use ($branchId) {
                    return  $query->where('branch_id', $branchId);
                })
                ->select('id', 'firstname', 'branch_id');
            $count = Cache::remember('doctorCount', 60, function () use ($model) {
                return $model->count();
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('timing_from', function ($doctor) {
                    return $doctor->doctor_details ? $doctor->doctor_details->timing_from : 'N/A';
                })
                ->addColumn('timing_to', function ($doctor) {
                    return $doctor->doctor_details ? $doctor->doctor_details->timing_to : 'N/A';
                })
                ->addColumn('consultancy_fee', function ($doctor) {
                    return $doctor->doctor_details ? $doctor->doctor_details->consultancy_fee : 'N/A';
                })
                ->addColumn('contact1', function ($doctor) {
                    return $doctor->doctor_details ? $doctor->doctor_details->contact1 : 'N/A';
                })
                ->addColumn('branch', function ($doctor) {
                    return $doctor->branch ? $doctor->branch->name : 'N/A';
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('doctor.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setTotalRecords($count)
                ->make(true);
        }
        return view('admin.doctor.list', $data);
    }
}
