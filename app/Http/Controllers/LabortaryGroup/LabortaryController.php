<?php

namespace App\Http\Controllers\LabortaryGroup;


use App\Models\Branch;


use App\Models\Labortary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\LabortaryFormRequest;

class LabortaryController extends Controller
{
    function index($id = null)
    {
        $data = [
            'title' => 'Add Labortary Test'
        ];
        $doctor_details = null;
        if ($id !== null) {
            $id = Labortary::findorFail($id);
            $labortary = $id;
            Gate::authorize('update-lab', $labortary);
        }
        $branches = Branch::all();
        return view('admin.labortary.index', $data, compact('branches', 'id', 'doctor_details'));
    }

    public function create(LabortaryFormRequest $request)
    {
        $updateId = $request->input('update_id');
        $Input = $request->all();

        if ($request->input('name')) {
            $Input['name'] = $request->name[0] == null ? null : $request->name;
        } else {

            $Input['name'] = $request->labortary_test !== null ? ["$request->labortary_test"] : null;
        }

        if ($updateId == null) {
            $txt = 'Added';
            $routeName = admin_route('labortary.index');
            $redirect = route($routeName);
        } else {
            $routeName = admin_route('labortary.list');
            $txt = 'Updated';
            $redirect = route($routeName);
        }

        $user =   Labortary::updateOrCreate(
            ['id' => $updateId],
            $Input
        );

        return response()->json([
            'success' => 'Test ' . $txt . ' Successfully!',
            'reload' => true
        ]);
    }
    public function edit(Request $request)
    {
        if ($request->currentId) {
            $data = Labortary::find($request->currentId);
            return response()->json($data);
        }
    }
    public function destroy($id)
    {
        $User = Labortary::find($id);
        $routeName = admin_route('labortarist.list');

        $User->delete();
        return response()->json([
            'success' => 'Labortarist Deleted Successfully !',
            'redirect' => route($routeName)
        ]);
    }
    public function list(Request $request)
    {
        $data = [

            'title' => 'Labortary Test List'
        ];
        if ($request->ajax()) {
            // it will be applied if we want to show test branch wise for now all branch have common test
            // $branchId = Auth::user()->branch_id;
            // when(Auth::user()->status === 0, function ($query) {
            //     return $query;
            // }, function ($query) use ($branchId) {
            //     return $query->where('branch_id', $branchId); // Otherwise, get services for the user's branch
            // })

            $model = Labortary::select('id', 'name', 'labortary_test', 'branch_id');
            $count = Cache::remember('labortaryCount', 60, function () use ($model) {
                return $model->count();
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    $name_cr = null;
                    foreach ($row->name as $n) {
                        $name_cr .= $n . ',';
                    }
                    return $name_cr;
                })
                ->addColumn('branch', function ($lab) {
                    return $lab->branch->name;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('labortary.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('labortary.delete'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action', 'name'])
                ->setTotalRecords($count)
                ->make(true);
        }
        return view('admin.labortary.list', $data);
    }

    //
}
