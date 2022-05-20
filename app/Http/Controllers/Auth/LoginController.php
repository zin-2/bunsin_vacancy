<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use Auth;
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

    public function login(Request $request){
        $input = $request->all();
   
        $rules =[
            'email' => 'required|email',
            'password' => 'required',
        ];
        $errorMessage = [
            'required' => 'Email-Address And Password Are Wrong.'
        ];
        $this->validate($request, $rules, $errorMessage);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('dashbaord');
            }elseif(auth()->user()->is_admin == 2){
                return redirect()->route('dashbaord');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('login')->with('message','Email-Address And Password Are Wrong.');
        }
          
    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/home');
      }
}
