<?php

namespace App\Http\Controllers\Receptionist\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\DoctorLoginRequest;
use App\Http\Requests\Auth\ReceptionistLoginRequest;
use App\Http\Requests\ReceptionFormRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Auth::guard('receptionist')->logout();

        // dd('dsd');
    return view('receptionist.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(ReceptionistLoginRequest $request): RedirectResponse
    {
        // dd('dasdads');
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('receptionist.dashboard.index', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('receptionist')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('receptionist.login'));
    }
}
