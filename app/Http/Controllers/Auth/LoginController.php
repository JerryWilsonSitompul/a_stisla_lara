<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; 
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


// Auth



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

    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL)
            ? $this->username()
            : 'username';

        return [
            $field => $request->get($this->username()),
            'password' => $request->password,
        ];
    }
    protected function authenticated(Request $request, $user){
        
        if($user->hasRole('admin')){//check if user login as role admin using <spatie role package> 
                activity(Auth::user()->name) // create log activity using <spatie activitylog package>
                ->causedBy(Auth::user())
                //->withProperties(['customProperty' => 'customValue'])
                ->log(Auth::user()->name .' has Been Login '  );   

            Alert::success('Congrats', 'You\'ve Successfully Log in');
            return Redirect()->route('dashboard');
        }
            Alert::success('Congrats', 'You\'ve Successfully Log in');
            return redirect()->route('home');
        // dd($user);
    }


    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }
}
