<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\Facades\DataTables;
// use Yajra\DataTables\Facades\DataTables;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('sa-authority');
        $data = [

            'title' => 'Branch'
        ];

        if ($request->ajax()) {
            $model = Branch::query();

            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-id="' . $row->id . '" class="editModal"><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route('admin.branch.delete', ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.branch.index', $data);
    }
    public function create(Request $request)
    {
        Gate::authorize('sa-authority');



        $Input = $request->validate([
            'name' => 'required',
            'branch_details' => 'nullable|string',
        ]);
        Branch::updateOrCreate(
            ['id' => $request->input('update_id')],
            $Input
        );
        $request->update_id !== null ? $txt = 'Updated !' : $txt = 'Added !';
        return response()->json([
            'success' => 'Branch has been' . ' ' . $txt,
            'redirect' => route('admin.branch.index')
        ]);
    }
    public function edit(Request $request)
    {
        Gate::authorize('sa-authority');


        if ($request->currentId) {
            $data = Branch::find($request->currentId);
            return response()->json($data);
        }
    }
    public function destroy($id)
    {
        Gate::authorize('sa-authority');

        $branch = Branch::find($id);
        $branch->delete();
        return response()->json([
            'success' => 'Branch Deleted Successfully !',
            'redirect' => route('admin.branch.index')
        ]);
    }
}
