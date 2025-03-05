<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Appointment;
use App\Models\LabortaryAppointment;
use App\Policies\AdminPolicy;
use App\Policies\AppointmentPolicy;
use App\Policies\BranchPolicy;
use App\Policies\labdetailPolicy;
use App\Policies\LabortaryAppointmentPolicy;
use App\Policies\LabortaryPolicy;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
// use View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    // super admin receptionist

    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
        // $this->app->singleton('admin_route', function ($app) {
        //     return function ($route) {
        //         if (Auth::guard('admin')->check()) {
        //             return route('admin.' . $route);
        //         }
        //         // if (Auth::guard('receptionist')->check()) {
        //         //     return route('receptionist.' . $route);
        //         // }
        //         return route($route);
        //     };
        // });

        // Make the function available globally
        // if (!function_exists('admin_route')) {
        //     function admin_route($route)
        //     {
        //         return app('admin_route')($route);
        //     }
        // }
    }
    //
    // }

    /**
     * Bootstrap any application services.
     */
    public function boot(Request $request): void
    {

        Gate::define('update-lab', [LabortaryPolicy::class, 'update']);
        Gate::define('test-result-manage', [labdetailPolicy::class, 'update']);
        Gate::define('patient-test-list', [LabortaryAppointmentPolicy::class, 'update']);
        Gate::define('sa-authority', function () {
            $user = Auth::user();
            if ($user->status === 0) {
                return true;
            }
            return false;
        });
        // Gate::define('admin-update', [AdminPolicy::class, 'update']);
        Gate::policy(Admin::class, AdminPolicy::class);
        Gate::define('userAuthority', function ($user, $branch) {
            // it checks user branch_id is suitable for passed branch_id
            if (!$user) {
                return false;
            }
            if ($user->status === 0) {
                return true;
            }
            $guards = ['admin', 'receptionist'];
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return $user->branch_id === intval($branch);
                }
            }
            return false;
        });

        Gate::define('hasAnyAuth', function ($user = null, ...$guards) {
            if (!is_array($guards)) {
                $guards = [$guards];
            }
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    // dd($guard);
                    return true;
                }
            }
            return false;
        });
        // except this guard
        Gate::define('exceptThisAuth', function ($user = null, ...$guards) {
            if (!is_array($guards)) {
                $guards = [$guards];
            }
            foreach ($guards as $guard) {
                if (Auth::guard($guard)->check()) {
                    return false;
                }
            }
            return true;
        });
        // blade used in forms
        Blade::directive('adminRoute', function ($expression) {
            return "<?php echo route(admin_route({$expression})); ?>";
        });
        // Define the custom Blade directive
        Blade::directive('hasAnyAuth', function ($expression) {
            return "<?php if (Gate::allows('hasAnyAuth', [{$expression}])) : ?>";
        });
        // Close the directive
        Blade::directive('endhasAnyAuth', function () {
            return "<?php endif; ?>";
        });
        Blade::directive('exceptThisAuth', function ($expression) {
            return "<?php if (Gate::allows('exceptThisAuth', [{$expression}])) : ?>";
        });
        // Close the directive
        Blade::directive('endexceptThisAuth', function () {
            return "<?php endif; ?>";
        });


        Blade::if('isAdmin', function () {
            if (Auth::guard('admin')->check()) {
                return true;
            }
            return false;
        });

        // Blade::if('isPatient', function () {
        //     if (Auth::guard('web')->check()) {
        //         return true;
        //     }
        //     return false;
        // });

        Blade::if('isDoctor', function () {
            if (Auth::guard('doctor')->check()) {
                return true;
            }
            return false;
        });
        Blade::if('isReceptionist', function () {
            if (Auth::guard('receptionist')->check()) {
                return true;
            }
            return false;
        });
        // Blade::if('islabortarist', function () {
        //     if (Auth::guard('labortarist')->check()) {
        //         return true;
        //     }
        //     return false;
        // });

        View::composer('layout.sidebar', function ($view) {
            $currentUrl = Request::url();
            if (Str::contains($currentUrl, 'public/patient')) {
                $route = 'patient';
            } elseif (Str::contains($currentUrl, 'public/admin')) {
                $route = 'admin';
            } elseif (Str::contains($currentUrl, 'public/doctor')) {
                $route = 'doctor';
            } elseif (Str::contains($currentUrl, 'public/receptionist')) {
                $route = 'receptionist';
            } elseif (Str::contains($currentUrl, 'public/labortarist')) {
                $route = 'labortarist';
            } else {
                dd('URL does not contain patient or admin');
            }
            $view->with([
                'route' => $route
            ]);
        });
        View::composer('layout.index', function ($view) {
            $currentUrl = Request::url();
            if (Str::contains($currentUrl, 'public/patient')) {
                $route = 'patient';
            } elseif (Str::contains($currentUrl, 'public/admin')) {
                $route = 'admin';
            } elseif (Str::contains($currentUrl, 'public/doctor')) {
                $route = 'doctor';
            } elseif (Str::contains($currentUrl, 'public/receptionist')) {
                $route = 'receptionist';
            } elseif (Str::contains($currentUrl, 'public/labortarist')) {
                $route = 'labortarist';
            } else {
                $route = '';
                // dd('URL does not contain patient or admin');
            }
            $view->with([
                'route' => $route
            ]);
        });
    }
}
