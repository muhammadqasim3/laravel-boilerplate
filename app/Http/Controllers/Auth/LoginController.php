<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Session;

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
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedIn');
		
          if(auth()->user()->isAdmin() == true) {
			   return redirect('admin/dashboard');
		  } else {

                Session::flash('message', 'You have logged In  Successfully'); 
                Session::flash('alert-class', 'alert-success'); 
			   return redirect('account');
		  }		
			
         
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        activity($user->name)
            ->performedOn($user)
            ->causedBy($user)
            ->log('LoggedOut');
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/login');
    }
    
}
