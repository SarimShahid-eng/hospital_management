<?php

namespace App\Http\Controllers\labortarist\Auth;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LabLoginRequest;
use App\Http\Requests\ReceptionFormRequest;
use App\Http\Requests\LabortaristFormRequest;
use App\Http\Requests\Auth\DoctorLoginRequest;
use App\Http\Requests\Auth\ReceptionistLoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Auth::guard('receptionist')->logout();

        // dd('dsd');
    return view('labortarist.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LabLoginRequest $request): RedirectResponse
    {
        // dd('dasdads');
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('labortarist.dashboard.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('labortarist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('labortarist.login'));
    }
}
