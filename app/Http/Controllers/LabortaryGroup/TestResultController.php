<?php

namespace App\Http\Controllers\LabortaryGroup;

use Carbon\Carbon;
use App\Models\labdetail;
use App\Models\Labortary;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class TestResultController extends Controller
{
    function test_result_manage(Request $request)
    {
        $data = [
            'title' => 'Test Result Manage'
        ];
        if ($request->ajax()) {

            $branchId = Auth::user()->branch_id;
            $model =
                labdetail::with([
                    'lab_app' => function ($query) {
                        $query->select('id', 'appointment_date', 'user_id', 'branch_id');
                    },
                    'lab_app.users' => function ($query) {
                        $query->select('id', 'firstname');
                    },
                    'lab_app.branch' => function ($query) {
                        $query->select('id', 'name');
                    },
                    'lab_test' => function ($query) {
                        $query->select('id', 'labortary_test');
                    }
                ])
                ->when(Auth::guard('admin')->check() || Auth::guard('doctor')->check() || Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
                    return Auth::user()->status === 0 && Auth::user()->status !== null
                        ? $query
                        : $query->whereRelation('lab_app', 'branch_id', $branchId);
                })

                ->when(Auth::guard('web')->check(), function ($query) {
                    return $query->whereRelation('lab_app', 'user_id', Auth::user()->id);
                })
                ->select('id', 'appointment_id', 'status', 'lab_test_id');

            return DataTables::eloquent($model)
                ->addIndexColumn() //
                ->addColumn('name', function ($lab_detail) {
                    $firstname = $lab_detail->lab_app->users->firstname;
                    $firstname = $firstname ? $firstname : 'N/A';
                    return  $firstname;
                })
                ->addColumn('branch_name', function ($lab_detail) {
                    $branch_name = $lab_detail->lab_app->branch->name;
                    $branches =  $branch_name ? $branch_name : 'N/A';
                    return  $branches;
                })
                ->addColumn('services', function ($lab_detail) {
                    $test = $lab_detail->lab_test->labortary_test;
                    return $test;
                })
                ->filter(function ($query) use ($request) {
                    $query->when(isset($request->from_date) && isset($request->to_date), function ($query) use ($request) {
                        $query->whereRelation('lab_app', 'appointment_date', '>=', $request->from_date)
                            ->whereRelation('lab_app', 'appointment_date', '<=', $request->to_date);
                    });

                    $query->when((isset($request->dateFilter) && $request->dateFilter !== "All"), function ($query) use ($request) {
                        if ($request->dateFilter == "Today") {
                            $today = Carbon::now('Asia/Karachi')->format('Y-m-d');
                            $query->whereRelation('lab_app', 'appointment_date', $today);
                        } else if ($request->dateFilter == "Yesterday") {
                            $yesterday = Carbon::yesterday()->format('Y-m-d');
                            $query->whereRelation('lab_app', 'appointment_date', $yesterday);
                        } else if ($request->dateFilter == "This Week") {
                            $startOfWeek = Carbon::now('Asia/Karachi')->startOfWeek()->format('Y-m-d');
                            $query->whereRelation('lab_app', 'appointment_date', '>=', $startOfWeek);
                        } elseif ($request->dateFilter == 'This Month') {
                            $startOfMonth = Carbon::now('Asia/Karachi')->startOfMonth()->format('Y-m-d');
                            $endOfMonth = Carbon::now('Asia/Karachi')->endOfMonth()->format('Y-m-d');
                            $query->whereRelation('lab_app', 'appointment_date', '>=', $startOfMonth)
                                ->whereRelation('lab_app', 'appointment_date', '<=', $endOfMonth);
                        }
                    });

                    $query->when(isset($request->statusFilter) && $request->statusFilter !== "Status", function ($query) use ($request) {
                        $query->where('status', strtolower($request->statusFilter));
                    });
                })
                ->addColumn('appointment_date', function ($lab_detail) {

                    $date = $lab_detail->lab_app->appointment_date;
                    return $date;
                })
                ->addColumn('status', function ($lab_detail) {
                    $status = $lab_detail->status == 'pending' ? '<div class="badge badge-light-danger">Pending</div>' : '<div class="badge badge-light-success">Completed</div>';
                    return $status;
                })
                ->addColumn('generate_result', function ($lab_detail) {
                    if (Auth::guard('web')->check() || Auth::guard('doctor')->check()) {
                        $result = null;
                    } else {
                        $result =  $lab_detail->result == null ? '<button data-lab-id="' . $lab_detail->id . '"  data-id="' . $lab_detail->lab_test_id . '"  class="generator btn btn-danger">Generate <span style="display:none;" class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>  </button> ' : '<button  data-lab-id="' . $lab_detail->id . '"  data-id="' . $lab_detail->lab_test_id . '"  class="generator btn btn-primary"> Update <span style="display:none;" class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span></button>';
                    }
                    return $result;
                })
                ->addColumn('result', function ($lab_detail) {
                    if ($lab_detail->status === 'completed') {
                        $btn = $btn = "<a target='_blank' href='" . route(admin_route('labortary.test_result_print'), ['id' => $lab_detail->id]) . "' class='btn btn-primary'> <i class='fa-solid fa-print'></i></a>";
                        return $btn;
                    }
                    return 'Pending...';
                })
                ->rawColumns(['status', 'generate_result', 'result'])
                ->make(true);
        }
        return view('admin.labortary.test_result', $data);
    }
    // category name description charges
    function generateTest(Request $request)
    {
        $lab_test_id = $request->id;
        $lab_detail_id = $request->lab_detail_id;
        if ($lab_test_id) {
            $data = Labortary::findorFail($lab_test_id);
            $lab_data = labdetail::findorFail($lab_detail_id);
            $html = null;
            '<div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">Branch name
                            </label>
                            <input type="text" id="branch_name" name="name" class="form-control form-control-solid" placeholder="Branch name" value="" fdprocessedid="nh1g2c">

                        </div>';
            foreach ($data->name as $key => $name) {
                $html .= '<div class="fv-row mb-7">
                            <label class="required fs-6 fw-semibold mb-2">' . $name . '
                            </label><input type="number"  name="result[' . $name . ']" class="form-control form-control-solid" placeholder=' . $name . ' value="' . @$lab_data->result[$key] . '" fdprocessedid="nh1g2c">  </div>';
            }
            $html .= '<input type="hidden"  name="update_id" value="' . $lab_detail_id . '" fdprocessedid="nh1g2c"> ';
            return response()->json([
                'html' => $html
            ]);
        }
    }
    function requestTestStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'result.*' => 'required',
            'update_id' => 'required'
        ], [
            'result.*.required' => 'Mention all the results properly',
            'update_id' => 'lab detail required'
        ]);

        if ($validator->fails()) {
            return ['error' => $validator->errors()->first(), 422];
        }
        $Input = $validator->validated();
        $lab_detail = labdetail::where('id', $Input['update_id'])->firstorFail();
        foreach ($Input['result'] as $keys => $result) {
            $data[] = "$result";
        }
        $lab_detail->update(['result' => $data, 'status' => 'completed']);
        $text = 'Generated';
        return response()->json([
            'success' => 'Report ' . $text . ' Successfully!',
            'reload' => true
        ]);
    }
    function generated_test_result()
    {
        return view('admin.labortary.generated_test_result');
    }
    function test_result_print($id)
    {
        $labdetails = labdetail::with(['lab_app', 'lab_app.users'])->where('status', 'completed')->findOrFail($id);
        Gate::authorize('test-result-manage', $labdetails);
        return view('admin.labortary.patient_test_manage.test_report_receipt', compact('labdetails'));
    }
}
