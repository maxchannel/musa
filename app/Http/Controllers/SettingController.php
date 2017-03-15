<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditPassRequest;

class SettingController extends Controller 
{
	public function settings()
    {
        $user = User::findOrFail(\Auth::user()->id);

        return view('settings.basic', compact('user', 'setting', 'menu'));
    }

    public function settings_store(EditUserRequest $request)
    {
        $user = User::findOrFail(\Auth::user()->id);
        $user->fill($request->all());
        $user->save();

        return \Redirect::back()->with('message', 'Perfil Actualizado');
    }

    public function settings_pass()
    {
        return view('settings.password');
    }

    public function settings_pass_store(EditPassRequest $request)
    {
        if($request->input('new') === $request->input('new_again'))
        {
            $user = User::find(\Auth::user()->id);
            
            if(\Hash::check($request->input('old'), $user->password)) 
            {
                $user->password = \Hash::make($request->input('new_again'));
                $user->save();
                return \Redirect::back()->with('message', 'Contraseña Actualizada');
            }else
            {
                return \Redirect::back()->withErrors(['Contraseña Incorrecta']);
            }
        }else//Sino coinciden las passwords
        {
            return \Redirect::back()->withErrors(['Las Contraseñas no Coinciden']);
        }
    }


}
