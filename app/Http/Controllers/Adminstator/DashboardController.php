<?php

namespace App\Http\Controllers\Adminstator;

use App\Models\User;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use App\Models\AppointmentDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];
        $branchId = Auth::user()->branch_id;
        $patients = User::when(Auth::guard('admin')->check()  || Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
            return Auth::user()->status === 0 && Auth::user()->status !== null
                ? $query
                : $query->where('branch_id', $branchId);
        })
            ->count();
        if (Auth::guard('doctor')->check()) {
            $patients = AppointmentDetail::where('doctor_id', Auth::id())->count();
        }
        $admins = Admin::when(Auth::guard('admin')->check() || Auth::guard('doctor')->check() || Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
            return Auth::user()->status === 0 && Auth::user()->status !== null
                ? $query
                : $query->where('branch_id', $branchId);
        })
            ->count();
        $doctors = Doctor::when(Auth::guard('admin')->check() || Auth::guard('doctor')->check() || Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
            return Auth::user()->status === 0 && Auth::user()->status !== null
                ? $query
                : $query->where('branch_id', $branchId);
        })->count();
        $receptionist = Receptionist::when(Auth::guard('admin')->check() || Auth::guard('doctor')->check() || Auth::guard('receptionist')->check(), function ($query) use ($branchId) {
            return Auth::user()->status === 0 && Auth::user()->status !== null
                ? $query
                : $query->where('branch_id', $branchId);
        })->count();
        return view('dashboard.index', $data, compact('patients', 'admins', 'doctors', 'receptionist'));
    }
}
