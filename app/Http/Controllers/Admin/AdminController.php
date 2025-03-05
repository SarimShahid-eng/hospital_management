<?php

namespace App\Http\Controllers\Admin;
// use Illuminate\Support\Facades\Log;
use App\Models\Admin;
use App\Models\Branch;
use Illuminate\View\View;
use App\Helpers\FileUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $data = [
            'title' => 'Add Admin'
        ];
        if ($id !== null) {
            $id = Admin::where('id', '!=', 1)->find($id);
            // only allow related branch user to updated its related records
            Gate::authorize('update', $id);
        }
        $branches = Branch::all();

        return view('admin.admin.admin_user', $data, compact('id', 'branches'));
    }
    public function create(AdminFormRequest $request)
    {
        $updateId = $request->input('update_id');
        $Input = $request->validated();
        if ($request->hasFile('image')) {
            $destination = '/images/admin_profile';
            $file = $request->file('image');
            $image = FileUploads::upload('image', $file, $destination);
            if (is_array($image)) {
                Log::error('File upload error', ['error' => $image]);
                return response()->json($image);
            }
            $Input['image'] = $image;
        }

        if ($updateId == null) {
            $txt = 'Added ';
            $routeName = admin_route('admin.index');
            $redirect = route($routeName);
        } else {
            $routeName = admin_route('admin.list');
            $txt = 'Updated ';
            $redirect = route($routeName);
        }
        if (isset($Input['password'])) {
            $Input['password'] = Hash::make($Input['password']);
        } else {
            unset($Input['password']);
        }

        Admin::updateOrCreate(
            ['id' => $updateId],
            $Input
        );

        return response()->json([
            'success' => 'Admin ' . $txt . ' Successfully!',
            'redirect' => route($routeName)
        ]);
    }
    // public function edit(Request $request)
    // {
    //     if ($request->currentId) {
    //         $data = Admin::find($request->currentId);

    //         return response()->json($data);
    //     }
    // }
    public function destroy($id)
    {
        $User = Admin::find($id);
        Gate::authorize('delete', $User);
        $routeName = admin_route('admin.list');

        $User->delete();
        return response()->json([
            'success' => 'Admin Deleted Successfully !',
            'redirect' => route($routeName)
        ]);
    }
    public function list(Request $request)
    {
        $data = [

            'title' => 'Admin List'
        ];
        if ($request->ajax()) {
            $branchId = Auth::user()->branch_id;

            $model = Admin::select('id', 'name', 'email', 'branch_id')
                ->when(Auth::user()->status === 0, function ($query) {
                    // except super admin
                    return $query->where('id', '!=', 1);
                }, function ($query) use ($branchId) {
                    return  $query->where('branch_id', $branchId);
                });

            $count = Cache::remember('countAdmin', 60, function () use ($model) {
                return  $model->count();
            });
            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('branch', function ($admin) {
                    $branches =  $admin->branch ? $admin->branch->name : 'N/A'; // Assuming 'content' is a field in the notes table
                    return  $branches;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('admin.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('admin.delete'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->setTotalRecords($count)
                ->make(true);
        }
        return view('admin.admin.list', $data);
    }
}
