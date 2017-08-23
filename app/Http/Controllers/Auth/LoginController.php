<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositories;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }


    public function login(Request $request,UserRepositories $userRepositories)
    {

        $validator = $this->validateLogin($request);
        $errors = $validator->errors();

        if(!empty($errors->first())){
            return response()->json(['code'=>-1,'msg'=>$errors->first()]);
        }

        if($userRepositories->isExitsByEmail($request->get('email'))===false){
            return $this->notRegister();
        }

        if ($ret = $this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }


        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);
        $this->authenticated($request, $this->guard()->user());
        return response()->json(['code'=>200,'msg'=>'登录成功','data'=>['redirect_url'=>$this->redirectTo]]);

    }

    protected function sendFailedLoginResponse(Request $request)
    {

        if ($request->expectsJson()) {
            return response()->json(['code'=>-1,'msg'=>'账号或密码错误']);
        }

    }

    protected function validateLogin(Request $request)
    {

        return Validator::make($request->all(), [
            $this->username() => 'required|email|string',
            'password' => 'required|string',
        ]);

    }



    protected function notRegister(){

        return response()->json(['code'=>-1,'msg'=>'没有此账号']);

    }
}
