<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;

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
        //$this->middleware('guest')->except('logout');
    }

    protected function login(Request $request,SessionManager $sessionManager){

        $v=$this->validator($request->all());
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
        $credentials = $request->only('email', 'password');

         if (Auth::guard()->attempt($credentials)){
            $user_session_cargo = User::select("cargo")->where("email",'=',$request->input("email"))
                          ->get();
                 session(['cargo' => $user_session_cargo[0]['cargo'] ]);
                return $this->sendLoginResponse($request);
            }
            $mensaje='This credentials do not macth our records.';
            $sessionManager->flash('mensaje',$mensaje );
            return back()->withInput($request->all());
    }
    protected function sendLoginResponse(Request $request)
    {
         $request->session()->regenerate();
         $user=$request->all();

        return $this->authenticated($request,$user) ?: redirect($this->redirectTo);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $user=$request->all();

        $request->session()->flush();
        $request->session()->regenerate();
        $request->session()->invalidate();

        return $this->authenticated($request,$user) ?: redirect('/');
    }
      protected function guard(){
        return Auth::guard();

    }

}
