<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\UserNotification;
use App\Http\Requests\StoreNewUserRequest;

class AuthController extends Controller 
{
	public function signup()
    {
        return view('auth.signup');
    }

    public function signupStore(StoreNewUserRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = \Hash::make($request->input('password'));
        $user->type = 'admin';
        $user->save();

        $not = new UserNotification;
        $not->m = 'Bienvenido';
        $not->user_id = $user->id;
        $not->v = 0;
        $not->save();

        return \Redirect::route('login')->with('message', 'Registro exitoso, ahora puedes iniciar sesión');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginSend()
    {
        $data = \Request::only('email','password','remember');
        $rules = ['email' => 'required|email','password' => 'required'];
        $validation = \Validator::make($data, $rules);

        if(!$validation->fails())
        {
            $credentials =['email'=>$data['email'], 'password'=>$data['password']];

            if(\Auth::attempt($credentials,$data['remember']))
            {
                return \Redirect::route('home');
            }else
            {
                return \Redirect::back()->withInput()->with('login_error', 1);
            }

        }else 
        {
            return \Redirect::back()->withErrors($validation);
        }

    }

    public function logout()
    {
        \Auth::logout();
        return \Redirect::route('home');
    }

}

