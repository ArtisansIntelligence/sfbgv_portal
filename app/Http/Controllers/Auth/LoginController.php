<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticate(Request $request, $user)
    {
        $horizontalMenuJson = file_get_contents(base_path('resources/json/horizontalMenu.json'));
        $horizontalMenuData = json_decode($horizontalMenuJson);
        $verticalMenuData = null;
        if (auth()->user()) {
            $role = auth()->user()->role_id;
            if ($role == 1) {
                $verticalMenuJson = file_get_contents(base_path('resources/json/verticalMenu.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
            }
            if ($role == 2) {
                $verticalMenuJson = file_get_contents(base_path('resources/json/verticalClientMenu.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
            }
            if ($role == 3) {
                $verticalMenuJson = file_get_contents(base_path('resources/json/verticalSpocMenu.json'));
                $verticalMenuData = json_decode($verticalMenuJson);
            }
        }
        View::share('menuData', [$verticalMenuData, $horizontalMenuData]);
    }
}
