<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;



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
    protected $redirectTo = 'admin/home';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ai middleware ta kaj korbe just guest der jonno.jodi guest hoi tahole
        // se logout bad diye login and register page access korte parbe.
        $this->middleware('guest:admin')->except('logout');
    }


      public function showLoginForm()
    {
        return view('admin.login');
    }

    // code for set admin role 

     protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach ($this->guard()->user()->role as $role) {
            if($role->name == 'admin'){

                return redirect('admin/home');
            }elseif ($role->name == 'editor') {
                return redirect('admin/editor');
            }
        }
    }


     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }




}
