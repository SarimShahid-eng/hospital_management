<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use PDO;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request, $id = null)
    {
        $data = [

            'tittle' => 'Dashboard'
        ];
        if ($id !== null) {
            $id = User::find($id);
        }


        return view('user.index', $data, compact('id'));
    }
    public function login() {
        return view('auth.userlogin');
    }
    public function create(Request $request)
    {
        Cache::forget('appointment_count');
        $updateId = $request->input('update_id');

        $rules = [
            'name' => 'required',
            'email' => 'email|unique:users,email,' . $updateId,
            'image' => 'nullable',
        ];

        if ($updateId == null) {
            $rules['password'] = 'required';
            $txt = 'Added !';
            $routeName = admin_route('user.index');
            $redirect=route($routeName);
        } else {
            $routeName = admin_route('user.list');

            $txt = 'Updated !';
            $redirect=route($routeName);
        }

        $Input = $request->validate($rules);

        if (isset($Input['password'])) {
            $Input['password'] = Hash::make($Input['password']);
        }

        User::updateOrCreate(
            ['id' => $updateId],
            $Input
        );

        // $txt = $updateId !== null ?  : 'Added !';

        return response()->json([
            'success' => 'User has been ' . $txt,
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
    public function destroy($id)
    {
        $User = User::find($id);
        $routeName = admin_route('user.list');

        $User->delete();
        return response()->json([
            'success' => 'User Deleted Successfully !',
            'redirect' => route($routeName)
        ]);
    }
    public function list(Request $request)
    {
        $data = [

            'tittle' => 'Dashboard'
        ];
        if ($request->ajax()) {
            $model = User::query();
        // $routeName = admin_route('user.list');


            return DataTables::eloquent($model)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route(admin_route('user.index'), ['id' => $row->id]) . '" data-id="' . $row->id . '" ><i style="font-size:15px;" class="text-primary fa fa-edit"></i> </a>';
                    $btn .= ' <a href="javascript:void(0)"   data-url="' . route(admin_route('user.delete'), ['id' => $row->id]) . '" class="delete" data-id="' . $row->id . '"  data-bs-toggle="modal" data-match="remove_data' . $row->id . '" data-bs-target="#remove_data"><i style="font-size:15px;" class="text-danger fa fa-trash"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('user.list', $data);
    }
    function permission_user() {
        $data = [

            'tittle' => 'Dashboard'
        ];
        return view('permission.index', $data);
    }
    //
}
