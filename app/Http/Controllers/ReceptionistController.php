<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Helpers\FileUploads;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ReceptionFormRequest;
use Illuminate\Support\Facades\Gate;

class ReceptionistController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $data = [

            'title' => 'Add Receptionist'
        ];
        if ($id !== null) {
            $id = Receptionist::find($id);
            Gate::authorize('update', $id);
        }
        $branches = Branch::all();

        return view('admin.receptionist.index', $data, compact('id', 'branches'));
    }
    public function create(ReceptionFormRequest $request)
    {

        $updateId = $request->input('update_id');
        $Input = $request->all();

        if ($request->hasFile('image')) {
            $destination = '/images/receptionist_profile';
            $file = $request->file('image');
            $image = FileUploads::upload('image', $file, $destination);

            if (is_array($image)) {
                return response()->json($image);
            }
            $Input['image'] = $image;
        }

        if ($updateId == null) {
            // $rules['password'] = 'required';
            $txt = 'Added ';
            $routeName = admin_route('receptionist.index');
            $redirect = route($routeName);
        } else {
            $routeName = admin_route('receptionist.list');
            $txt = 'Updated ';
            $redirect = route($routeName);
        }


        if (isset($Input['password'])) {
            $Input['password'] = Hash::make($Input['password']);
        } else {
            unset($Input['password']);
        }

        Receptionist::updateOrCreate(
            ['id' => $updateId],
            $Input
        );

        return response()->json([
            'success' => 'Receptionist ' . $txt . ' Successfully!',
            'redirect' => route($routeName)
        ]);
    }
    // public function edit(Request $request)
    // {
    //     if ($request->currentId) {
    //         $data = Receptionist::find($request->currentId);
    //         return response()->json($data);
    //     }
    // }
    public function destroy($id)
    {
        $User = Receptionist::find($id);
        Gate::authorize('delete', $User);
        $routeName = admin_route('receptionist.list');

        $User->delete();
        return response()->json([
            'success' => 'Receptionist Deleted Successfully !',
            'redirect' => route($routeName)
        ]);
    }
    public function list(Request $request)
    {
        $data = [
            'title' => 'Receptionist List'
        ];
        if ($request->ajax()) {
            $branchId = Auth::user()->branch_id;
            $model = Receptionist::query()
                ->when(Auth::user()->status === 0, function ($query) {
                    return $query;
                }, function ($query) use ($branchId) {
                    return  $query->where('branch_id', $branchId);
                });

            return DataTables::eloquent($model)
                ->addColumn('branch', function ($receptionist) {
                    $branches =  $receptionist->branch ? $receptionist->branch->name : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $branches;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('receptionist.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('receptionist.delete'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('receptionist.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('receptionist.delete'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.receptionist.list', $data);
    }
    //
}
